<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 8:37 PM
 */

namespace CB\ReviewerBundle\Controller;


use CB\ReviewerBundle\Entity\Reviewer;
use CB\ReviewerBundle\Form\Model\ReviewerType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewerController extends Controller {
    public function addAction($project, $instance, Request $request) {

        $form = $this->createForm(new ReviewerType());
        $form->handleRequest($request);

        if($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $projectObject = $em->getRepository('CBProjectBundle:Project')->find($project);
            $grant = $em->getRepository('CBGrantBundle:GrantCycleInstance')->find($instance);

            $accounts = $form['reviewers']->getData();
            foreach($accounts as $id) {
                $reviewer = new Reviewer();
                $account = $em->getRepository('CBAccountBundle:Account')->find($id);
                $reviewer->setAccount($account);
                $reviewer->setGrantCycleInstance($grant);
                $projectObject->addReviewer($reviewer);
            }

            $em->persist($projectObject);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_grant_instance_permalink'), array(
                'user'=>'funder',
                'id'=>$instance,
            ));
        } else {
            return $this->render('CBMainBundle:Default:CreateForm.html.twig', array(
                'form'=>$form->createView(),
                'title'=>'Add Reviewers'
            ));
        }
    }
} 