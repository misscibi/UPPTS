<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccountType
 *
 * @author Christabel
 */

namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('primaryEmail', new ContactEmailType(), array(
                                        'label'=> 'Email Address'
                ))
                ->add('password', 'repeated', array(
                        'type' => 'password',
                        'invalid_message' => 'The password fields must match.',
                        'options' => array('attr' => array('class' => 'password-field')),
                        'required' => true,
                        'first_options'  => array('label' => 'Password'),
                        'second_options' => array('label' => 'Confirm Password'),
                    ))
                ->add('firstName', 'text')
                ->add('middleName', 'text', array(
                                        'required' => false,
                ))
                ->add('lastName', 'text')
                ->add('birthdate', 'date')
                ->add('contactEmail', 'bootstrap_collection', array(
                                        'label' => 'Alternate Email Address',
                                        'type' => new ContactEmailType(),
                                        'add_button_text' => 'Add Email Address',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                    ))
                ->add('contactPhone', 'bootstrap_collection', array(
                                        'label' => 'Phone Number',
                                        'type' => new ContactPhoneType(),
                                        'add_button_text' => 'Add Phone Number',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'prototype_name'     => 'inlinep',
                                        'options' => array('attr' => array('style'=>'inline')),
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                    ))
                ->add('education', 'bootstrap_collection', array(
                                        'label' => false,
                                        'type' => new EducationType(),
                                        'add_button_text' => 'Add Education',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'options' => array('attr' => array('class'=>'well bs-component')),
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                    ))
                ->add('employee', 'bootstrap_collection', array(
                                        'label' => false,
                                        'type' => new EmployeeType(),
                                        'add_button_text' => 'Add Employee Profile',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'options' => array('attr' => array('class'=>'well bs-component')),
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                    ))
                ->add('academicExperience', 'bootstrap_collection', array(
                                        'label' => false,
                                        'type' => new AcademicExperienceType(),
                                        'add_button_text' => 'Add Other Academic Experiences',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'options' => array('attr' => array('class'=>'well bs-component')),
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                    ))
                
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\Account',
            'cascade_validation' => true,
        ));
    }
    
    public function getName() {
        return 'account';
    }

}
