<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 10:33 PM
 */

namespace CB\ReviewerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhaseProjectController extends Controller {
    public function viewAction($user, $project, $phase, $review) {
        $em = $this->getDoctrine()->getManager();
        $projectObj = $em->getRepository('CBProjectBundle:Project')->find($project);
        $instance = $em->getRepository('CBGrantBundle:PhaseInstance')->find($phase);

        if($user == 'reviewer') {
            $reviewer = $em->getRepository('CBReviewerBundle:Reviewer')->find($review);
            $reviews = $em->getRepository('CBReviewerBundle:Review')->findBy(array(
                'reviewer'=>$reviewer,
                'phaseInstance'=>$instance,
            ));

            return $this->render('CBReviewerBundle:Reviewer:PhaseProjectPermalink.html.twig', array(
                'project'=> $projectObj,
                'instance'=> $instance,
                'reviews'=>$reviews
            ));
        } else if ($user == 'funder') {


            $query = $em->getRepository('CBReviewerBundle:Review')->createQueryBuilder('r')
                ->join('r.reviewer', 'd')
                ->where('d.project = :project and d.grantCycleInstance = :grant')
                ->setParameters(array('project'=>$projectObj, 'grant'=>$instance->getGrantCycleInstance()))
                ->getQuery();

            $reviews = $query->getResult();

            return $this->render('CBReviewerBundle:Funder:PhaseProjectPermalink.html.twig', array(
                'project'=> $projectObj,
                'instance'=> $instance,
                'reviews' => $reviews
            ));

        } else {

            $query = $em->getRepository('CBReviewerBundle:Review')->createQueryBuilder('r')
                ->join('r.reviewer', 'd')
                ->where('d.project = :project and d.grantCycleInstance = :grant')
                ->setParameters(array('project'=>$projectObj, 'grant'=>$instance->getGrantCycleInstance()))
                ->getQuery();

            $reviews = $query->getResult();


            return $this->render('CBReviewerBundle:Proponent:PhaseProjectPermalink.html.twig', array(
                'project'=> $projectObj,
                'instance'=> $instance,
                'reviews' => $reviews
            ));
        }

    }
} 