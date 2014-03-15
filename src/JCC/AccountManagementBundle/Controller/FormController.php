<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace JCC\AccountManagementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of FormController
 *
 * @author Christabel
 */
class FormController extends Controller {
    //put your code here
    public function indexAction ($id) {
        
        $form = $this->createFormBuilder()
            ->add('task', 'text')
            ->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();        
        
        return $this->render('JCCAccountManagementBundle:Default:account_form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
