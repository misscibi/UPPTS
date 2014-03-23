<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrantSourcesType
 *
 * @author Christabel
 */


namespace CB\GrantBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantSourcesType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        
        $builder
                ->add('grantSourceName', 'text', array(
                                                'label'=>false,
                ))
                ->add('file', 'file', array(
                                                'label'=>false,
                ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
                ->setDefaults(array(
                    'data_class' => 'CB\GrantBundle\Entity\GrantSources',
                ))
            ;
    }
    
    public function getName()
    {
        return 'grantSources';
    }
    
}
