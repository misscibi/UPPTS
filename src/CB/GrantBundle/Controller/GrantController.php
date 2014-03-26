<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 1:42 PM
 */

namespace CB\GrantBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CB\GrantBundle\Form\Type\GrantCycleType;
use CB\GrantBundle\Entity\GrantCycle;
use Symfony\Component\HttpFoundation\Request;


class GrantController extends Controller {
    public function viewAllAction() {
        $grants = $this->getDoctrine()->getManager()->getRepository('CBGrantBundle:Grant')->findAll();

        return $this->render('CBGrantBundle:Default:AllGrants.html.twig', array(
            'grants'=>$grants,
        ));
    }

    public function viewAction($id, Request $request) {
        $grant = $this->getDoctrine()->getManager()->getRepository('CBGrantBundle:Grant')->find($id);

        $grantCycle = new GrantCycle();
        $cycleForm = $this->createForm(new GrantCycleType(), $grantCycle);
        $cycleForm->handleRequest($request);

        if($cycleForm->isValid()) {
            $grantCycle->setGrant($grant);
            $em = $this->getDoctrine()->getManager();
            $em->persist($grantCycle);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_grant_permalink', array('id'=>$id)));
        } else {

            return $this->render('CBGrantBundle:Default:GrantPermalink.html.twig', array(
                'grant'=>$grant,
                'cycle_form'=>$cycleForm->createView(),
            ));
        }
    }
} 