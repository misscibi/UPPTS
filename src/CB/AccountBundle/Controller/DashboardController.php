<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 12:26 AM
 */

namespace CB\AccountBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {

    public function indexAction () {
        $em = $this->getDoctrine()->getManager();
        $announcements = $em->getRepository('CBAccountBundle:Announcement')->findAll();
        $fundedGrants = $em->getRepository('CBAccountBundle:Account')->find($this->getUser()->getAccountId())->getFundedGrant();
        $projects = $this->findProjects($em);
        $reviewer = $em->getRepository('CBReviewerBundle:Reviewer')->findByAccount($this->getUser());

        return $this->render('CBAccountBundle:Default:Dashboard.html.twig', array(
            'announcements'=>$announcements,
            'projects'=>$projects,
            'grants'=>$fundedGrants,
            'reviewer'=>$reviewer,
        ));
    }

    private function findProjects($em) {
        $proponentObjects = $em->getRepository('CBProjectBundle:Proponent')->findByAccountId($this->getUser()->getAccountId());

        $projects = new ArrayCollection();

        foreach($proponentObjects as $object) {
            $projects[] = $object->getProject();
        }

        return $projects;
    }
} 