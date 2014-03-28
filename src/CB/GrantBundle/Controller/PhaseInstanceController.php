<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 1:14 PM
 */

namespace CB\GrantBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PhaseInstanceController extends Controller {
    /*
    public function viewAction ($id) {
        $em = $this->getDoctrine()->getManager();
        $instance = $em->getRepository('CBGrantBundle:PhaseInstance')->find($id);

        return $this->render('CBGrantBundle:Default:PhaseInstancePermalink.html.twig', array(
            'phaseInstance' => $instance,
        ));
    }
    */
    public function viewAction($user, $phase, $project) {
        $em = $this->getDoctrine()->getManager();
        $phaseObject = $em->getRepository('CBGrantBundle:PhaseInstance')->find($phase);
        $projectObject = $em->getRepository('CBProjectBundle:Project')->find($project);

        if($user === 'funder') {
            return $this->render('CBGrantBundle:Funder:PhaseInstancePermalink.html.twig', array(
                'instance'=>$phaseObject
            ));
        } else {
            return $this->render('CBGrantBundle:Proponent:PhaseInstancePermalink.html.twig', array(
                'project'=>$projectObject,
                'instance'=>$phaseObject
            ));
        }

    }
} 