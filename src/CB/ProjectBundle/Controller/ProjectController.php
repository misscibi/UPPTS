<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 3:05 PM
 */

namespace CB\ProjectBundle\Controller;


use CB\ProjectBundle\Entity\Project;
use CB\ProjectBundle\Entity\Proponent;
use CB\ProjectBundle\Form\Type\ProjectType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjectController extends Controller {
    public function createAction (Request $request) {
        $project = new Project();
        $proponent = new Proponent();
        $proponent->setAccount($this->getUser());
        $project->addProponent($proponent);

        $form = $this->createForm(new ProjectType(), $project);
        $form->handleRequest($request);

        if($form->isValid()) {

            $areas = $project->getProjectResearchArea();
            foreach($project->getProjectResearchArea() as $area) {
                if($researchArea = $this->getDoctrine()->getRepository('CBGrantBundle:ResearchArea')->find($area->getResearchAreaTag())) {
                    $areas[] = $researchArea;
                    $project->removeProjectResearchAreon($area);
                }
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($project);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_dashboard'));
        } else {

            return $this->render('CBMainBundle:Default:CreateForm.html.twig', array(
                'form'=>$form->createView(),
            ));
        }
    }

    public function viewAction ($user, $id) {
        $project = $this->getDoctrine()->getRepository('CBProjectBundle:Project')->find($id);

        if($user == 'proponent') {
            return $this->render('CBProjectBundle:Proponent:ProjectPermalink.html.twig', array(
                'project'=>$project
            ));
        } else if ($user == 'reviewer' ) {
            return $this->render('CBProjectBundle:Review:ProjectPermalink.html.twig', array(
                'project'=>$project
            ));
        } else {
            return $this->render('CBProjectBundle:Default:ProjectPermalink.html.twig', array(
                'project'=>$project
            ));
        }
    }
} 