<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormController
 *
 * @author Christabel
 */

namespace CB\GrantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CB\GrantBundle\Entity\Grant;
use CB\GrantBundle\Form\Type\GrantType;
use CB\GrantBundle\Entity\GrantBlacklistType;

class CreateController extends Controller {
    
    public function grantAction (Request $request) {
        $grant = new Grant();
        
        $form = $this->createForm(new GrantType(), $grant);
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $grant->addFunder($this->getUser());
            $types = $form['grantBlacklistType']->getData();
            foreach($types as $type) {
                $btype = new GrantBlacklistType();
                $btype->setGrantType($type);
                $grant->addGrantBlacklistType($btype);
            }
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($grant);
            $em->flush();
            
            return $this->redirect($this->generateUrl('cb_dashboard'));
        } else {
            return $this->render('CBGrantBundle:Default:GrantRegistrationForm.html.twig', array(
                    'form'=>$form->createView(),
            )); 
        }
        
    }
    
}
