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
                ->add('natureOfAppointment', 'choice', array(
                                        'label' => 'Nature of Appointment',
                                        'choices' => array('Permanent'=>'Permanent',
                                                        'Temporary'=>'Temporary'),
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
                                        'years'=>range(date("Y"), date("Y")-100, -1),
                ))
                ->add('endDate', 'date', array(
                                        'label' => 'End Date',
                                        'years'=>range(date("Y"), date("Y")-100, -1),
                                        'required'=>false,
                                        'empty_data'=>null,
                ))
                ->add('universityEmployee', new UniversityEmployeeType(), array(
                                        'label' => 'University Employee',
                                        'required'=>false,
                ))
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
