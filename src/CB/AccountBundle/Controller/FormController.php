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
use CB\AccountBundle\Entity\ContactEmail;
use CB\AccountBundle\Form\Type\AccountType;

/**
 * Description of FormController
 *
 * @author Christabel
 */
class FormController extends Controller {
    //put your code here
    public function indexAction ($id, Request $request)
    {
        $account = new Account();
        
        if ( $id != 0 ) {
            // If user want to edit account, retrieve account details 
            $account = $this->getDoctrine()
                    ->getRepository('CBAccountBundle:Account')
                    ->find($id);

            if (!$account) {
                throw $this->createNotFoundException(
                    'No account found for id '.$id
                );
            }   
        } else {
            $account->addContactEmail(new ContactEmail());
        }
                
        $form = $this->createForm(new AccountType(), $account);
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
            
            return $this->render("Hello world!");
        } else {
            return $this->render('CBAccountBundle:Default:accountForm.html.twig', array(
                'form' => $form->createView(),
            ));
        }
        
    }
}
