<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CB\AccountBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use CB\AccountBundle\Entity\Account;
use CB\AccountBundle\Form\Type\AccountType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Description of FormController
 *
 * @author Christabel
 */
class FormController extends Controller {
    //put your code here
    public function indexAction (Request $request)
    {
        $account = new Account();
        
        $form = $this->createForm(new AccountType(), $account);
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
            
            return $this->redirect($this->generateUrl('cb_main_homepage'));
        } else {
            return $this->render('CBAccountBundle:Default:accountForm.html.twig', array(
                'form' => $form->createView(),
            ));
        }
        
    }
    
    public function editAction ($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $account = $em->getRepository('CBAccountBundle:Account')->find($id);
        
        if(!$account) {
            throw $this->createNotFoundException('No account found with ID '.$id);
        }
                
        $account->removeContactEmail($account->getPrimaryEmail());
        
        $oldContactEmails = new ArrayCollection();
        $oldContactPhones = new ArrayCollection();
        
        $this->addToOldCollection($oldContactEmails, $account->getContactEmail());
        $this->addToOldCollection($oldContactPhones, $account->getContactPhone());
        
        $editForm = $this->createForm(new AccountType(), $account);
        $editForm->handleRequest($request);
        
        if($editForm->isValid()) {
            $this->removeEntityManyToOne($oldContactEmails, $account->getContactEmail(), $em, true);
            $this->removeEntityManyToOne($oldContactPhones, $account->getContactPhone(), $em, true);
            
            
            $em->persist($account);
            $em->flush();

            return $this->redirect($this->generateUrl('cb_main_homepage'));
        } else {
            return $this->render('CBAccountBundle:Default:accountForm.html.twig', array(
                'form' => $editForm->createView(),
            ));
        }
    }
    
    function addToOldCollection($oldValues, $newValues) {
        foreach($newValues as $value) {
            $oldValues->add($value);
        }
    }
    
    function removeEntityManyToOne($oldValues, $newValues, $em, $toBeRemoved ) {
        foreach($oldValues as $value) {
                // check the old collection with the one recently submitted
            if (false === $newValues->contains($value)) {
                // remove the Account from the Email
                //$email->getAccount()->removeElement($account);
                $value->setAccount(null);
                $em->persist($value);
                if($toBeRemoved) {
                    $em->remove($value); // remove from the database!
                }
            }               
        }
    }
}
