<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/29/14
 * Time: 12:54 AM
 */

namespace CB\ReviewerBundle\Controller;


use CB\ReviewerBundle\Entity\Review;
use CB\ReviewerBundle\Form\Type\ReviewType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \DateTime;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller {
    public function addAction ($reviewer, $instance, Request $request) {

        $review = new Review();

        $form = $this->createForm(new ReviewType(), $review);
        $form->handleRequest($request);

        if($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $reviewerObj = $em->getRepository('CBReviewerBundle:Reviewer')->find($reviewer);
            $phase = $em->getRepository('CBGrantBundle:PhaseInstance')->find($instance);

            $review->setReviewer($reviewerObj);
            $review->setPhaseInstance($phase);

            $review->setCreateTimestamp(new DateTime());
            $review->setUpdateTimestamp(new DateTime());

            $em->persist($review);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_phase_project_permalink', array(
                'user'=>'reviewer',
                'project'=>$reviewerObj->getProject()->getProjectId(),
                'phase'=>$instance,
                'review'=>$reviewerObj->getReviewerId(),
            )));
        } else {
            return $this->render('CBMainBundle:Default:CreateForm.html.twig', array(
                'form'=>$form->createView(),
                'title'=>'Add Review'
            ));
        }
    }
} 