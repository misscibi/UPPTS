<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EducationType
 *
 * @author Christabel
 */

namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class EducationType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('degree', 'text', array(
                                        'label' => 'Degree',
                ))
                ->add('specialization', 'text', array(
                                        'label' => 'Specialization',
                                        'required' => false,
                ))
                ->add('university', 'text', array(
                                        'label' => 'University',
                ))
                ->add('constituentUniversity', 'text', array(
                                        'label' => 'Constituent University',
                ))
                ->add('graduationDate', 'date', array(
                                        'label' => 'Graduation Date',
                ))
                ->add('academicExperience', 'textarea', array(
                                        'label' => 'Other Academic Experience',
                ))
                        
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\Education',
            'style' => 'inline',
        ));
    }
    
    public function getName() {
        return 'contactPhone';
    }
}
