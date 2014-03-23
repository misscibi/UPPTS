<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrantType
 *
 * @author Christabel
 */

namespace CB\GrantBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantType extends AbstractType {
    
    private $grantTypes = array(
                            'UP'=>'UP-based',
                            'Government'=>'Government',
                            'Private'=>'Private'
    );
    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        
        $builder->add('grantName', 'text', array(
                                            'label'=>'Title of Grant',
        ))
                ->add('grantDescription', 'textarea', array(
                                            'label'=>'Grant Description',
                ))
                ->add('grantType', 'choice', array(
                                            'label'=>'Grant Type',
                                            'choices'=>$this->grantTypes,
                ))
                ->add('grantAmount', 'text', array(
                                            'label'=>'Grant Amount',
                ))
                ->add('grantBlacklist', 'bootstrap_collection', array(
                                        'label'=>'Grant ID To Be Blacklisted',
                                        'type' => 'grant_selector',
                                        'add_button_text' => 'Add Grant',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                ))
                ->add('grantBlacklistType', 'choice', array(
                                        'label'=>'Grant Types To Blacklist',
                                        'choices'=>$this->grantTypes,
                                        'multiple'=>true,
                                        'expanded'=>true,
                                        'mapped' => false,
                ))
                ->add('grantSource', 'bootstrap_collection', array(
                                        'label'=>'Grant Sources',
                                        'type' => new GrantSourcesType(),
                                        'add_button_text' => 'Add Files',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2,
                                        'delete_button_text' => 'Delete',
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                                        'cascade_validation' => true,
                ))
                ->add('Save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
                ->setDefaults(array(
                    'data_class' => 'CB\GrantBundle\Entity\Grant',
                    'cascade_validation' => true,
                ))
            ;
    }
    
    public function getName()
    {
        return 'grant';
    }
}
