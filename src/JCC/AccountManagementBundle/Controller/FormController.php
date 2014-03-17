<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JCC\AccountManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use JCC\AccountManagementBundle\Entity\Account;
use JCC\AccountManagementBundle\Form\Type\AccountType;

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
                    ->getRepository('JCCAccountManagementBundle:Account')
                    ->find($id);

            if (!$account) {
                throw $this->createNotFoundException(
                    'No account found for id '.$id
                );
            }            
        }
        
        $form = $this->createForm(new AccountType(), $account);
        
        $form->handleRequest($request);
        
        if($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($account);
            $em->flush();
            
            return $this->redirect($this->generateURL('jcc_main_homepage'));
        } else {
            return $this->render('JCCAccountManagementBundle:Default:account_form.html.twig', array(
                'form' => $form->createView(),
            ));
        }
        
    }
}
