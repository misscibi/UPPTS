<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 1:14 PM
 */

namespace CB\GrantBundle\Controller;


use CB\GrantBundle\Entity\AcceptedProjectsInPhase;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        } else if ($user === 'reviewer') {
            return $this->render('CBGrantBundle:Reviewer:PhaseInstancePermalink.html.twig', array(
                'project'=>$projectObject,
                'instance'=>$phaseObject
            ));
        } else {
            return $this->render('CBGrantBundle:Proponent:PhaseInstancePermalink.html.twig', array(
                'project'=>$projectObject,
                'instance'=>$phaseObject
            ));
        }

    }

    public function submitProjectAction($phase, $project, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $phaseObject = $em->getRepository('CBGrantBundle:PhaseInstance')->find($phase);
        $projectObject = $em->getRepository('CBProjectBundle:Project')->find($project);

        $projectObject->addPhaseInstanceSubmitted($phaseObject);
        $em->persist($projectObject);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }

    public function approveAction($project, $instance, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $phaseObject = $em->getRepository('CBGrantBundle:PhaseInstance')->find($instance);
        $projectObject = $em->getRepository('CBProjectBundle:Project')->find($project);

        $obj = new AcceptedProjectsInPhase();
        $obj->setProject($projectObject);
        $obj->setPhaseInstance($phaseObject);

        $phaseObject->addAcceptedProjectsInPhase($obj);
        $em->persist($phaseObject);
        $em->flush();

        return $this->redirect($request->headers->get('referer'));
    }
} 