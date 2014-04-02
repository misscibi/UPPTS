<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactPhoneType
 *
 * @author Christabel
 */
namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ContactPhoneType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('type', 'choice', array(
                                        'choices' => array('Mobile'=>'Mobile','Telephone'=>'Telephone',  'Fax'=>'Fax' ),
                                        'label' => false,
                                        'attr' => array('widget_col'=>3)
                ))
                ->add('phoneNumber', 'text', array(
                                        'label' => false,
                                        'attr' => array('widget_col'=>9)
                ))
                        
        ;
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\ContactPhone',
            'style' => 'inline',
        ));
    }
    
    public function getName() {
        return 'contactPhone';
    }
}
