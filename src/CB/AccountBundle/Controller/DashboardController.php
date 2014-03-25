<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 12:26 AM
 */

namespace CB\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DashboardController extends Controller {

    public function indexAction () {
        $em = $this->getDoctrine()->getManager();
        $announcements = $em->getRepository('CBAccountBundle:Announcement')->findAll();

        return $this->render('CBAccountBundle:Default:Dashboard.html.twig', array(
            'announcements'=>$announcements,
        ));
    }

} 