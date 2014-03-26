<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 1:07 AM
 */

namespace CB\GrantBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GrantInstanceController extends Controller {
    public function viewAction($id) {
        $em = $this->getDoctrine()->getManager();
        $grantCycle = $em->getRepository('CBGrantBundle:GrantCycle')->find($id);
        $cycleInstance = $em->getRepository('CBGrantBundle:GrantCycleInstance')->findBy(array('grantCycle'=>$grantCycle));

        return $this->render('CBGrantBundle:Default:AllGrantInstances.html.twig', array(
           'cycleInstance' => $cycleInstance,
            'grantCycle' => $grantCycle,
        ));
    }

    public function createAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $grantCycle = $em->getRepository('CBGrantBundle:GrantCycle')->find($id);

        $grantCycleInstance= new GrantCycleInstance();
        $instanceForm = $this-createForm(new GrantCycleInstanceType(), $grantCycleInstance);
        $instanceForm->handleRequest($request);

        if($instanceForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($grantCycleInstance);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_grant_instance', array('id'=>$id)));
        } else {

            return $this->render('CBGrantBundle:Default:GrantPermalink.html.twig', array(
                'form'=>$instanceForm->createView(),
            ));
        }
    }
} 