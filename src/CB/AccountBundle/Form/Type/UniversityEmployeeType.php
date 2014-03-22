<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UniversityEmployee
 *
 * @author Christabel
 */

namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UniversityEmployeeType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('department', 'text', array(
                                        'label' => 'Department',
                ))
                ->add('constituentUniversity', 'text', array(
                                        'label' => 'Constituent University',
                ))
                ->add('academicExperience', 'textarea', array(
                                        'label' => 'Academic Experience',
                ))
                        
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\UniversityEmployee',
        ));
    }
    
    public function getName() {
        return 'universityEmployee';
    }
}
