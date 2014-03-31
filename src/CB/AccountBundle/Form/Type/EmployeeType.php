<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmployeeType
 *
 * @author Christabel
 */

namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmployeeType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('isPermanent', 'checkbox', array(
                                        'label' => 'Permanent Employee?',
                                        'attr' => array('align_with_widget'=>true),
                                        'required' => false,
                ))
                ->add('workingUpToPresent', 'checkbox', array(
                                        'mapped' => false,
                                        'label' => 'Working up to present?',
                                        'attr' => array('align_with_widget'=>true),
                                        'required' => false,
                ))
                ->add('type', 'text', array(
                                        'label' => 'Type',
                ))
                ->add('positionTitle', 'text', array(
                                        'label' => 'Position Title',
                ))
                ->add('salaryGrade', 'text', array(
                                        'label' => 'Salary Grade',
                ))
                ->add('tin', 'text', array(
                                        'label' => 'TIN',
                ))
                ->add('bankName', 'text', array(
                                        'label' => 'Bank Name',
                ))
                ->add('bankAccountNumber', 'text', array(
                                        'label' => 'Bank Account Number',
                ))
                ->add('annualSalary', 'text', array(
                                        'label' => 'Annual Salary',
                ))
                ->add('companyCollege', 'text', array(
                                        'label' => 'Name of Company / College',
                ))
                ->add('startDate', 'date', array(
                                        'label' => 'Start Date',
                ))
                ->add('endDate', 'date', array(
                                        'label' => 'End Date',
                ))
        /*
                ->add('isUniversityEmployee', 'checkbox', array(
                                        'label' => 'University Employee?',
                                        'attr' => array('align_with_widget'=>true),
                                        'required' => false,
                                        'mapped' => false
                ))
                ->add('universityEmployee', new UniversityEmployeeType(), array(
                                        'label' => false,
                                        'attr' => array('class'=>'well bs-component'),
                                        'mapped' => false
                ))
                 */
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\Employee',
        ));
    }
    
    public function getName() {
        return 'employee';
    }
}
