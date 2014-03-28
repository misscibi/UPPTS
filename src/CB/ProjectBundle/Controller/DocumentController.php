<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 2:18 PM
 */

namespace CB\ProjectBundle\Controller;


use CB\ProjectBundle\Entity\ProjectDocument;
use CB\ProjectBundle\Form\Type\ProjectDocumentType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DocumentController extends Controller {
    public function createAction($project, $phase, $document, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $projectObject = $em->getRepository('CBProjectBundle:Project')->find($project);
        $instance = $em->getRepository('CBGrantBundle:PhaseInstance')->find($phase);
        $documentObject = $em->getRepository('CBGrantBundle:GrantPhaseRequiredDocument')->find($document);

        $projectDocument = new ProjectDocument();
        $form = $this->createForm(new ProjectDocumentType(), $projectDocument);
        $form->handleRequest($request);

        if($form->isValid()) {
            $projectDocument->setProject($projectObject);
            $projectDocument->setPhaseInstance($instance);
            $projectDocument->setGrantDocument($documentObject);

            $em->persist($projectDocument);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_phase_instance_permalink', array(
                'user'=>'proponent',
                'phase'=>$phase,
                'project'=>$project,
            )));
        } else {

            return $this->render('CBMainBundle:Default:CreateForm.html.twig', array(
                'form'=>$form->createView(),
                'title'=>'Upload Document'
            ));
        }

    }
} 