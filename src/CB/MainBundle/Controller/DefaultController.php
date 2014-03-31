<?php

namespace CB\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $announcements = $em->getRepository('CBAccountBundle:Announcement')->findAll();
        $grants = $em->getRepository('CBGrantBundle:Grant')->findAll();


        return $this->render(
            'CBMainBundle:Default:index.html.twig',
            array(
                'announcements' => $announcements,
                'grants' => $grants
            )
        );
    }
}
