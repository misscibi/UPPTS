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
use CB\AccountBundle\Form\Type\ContactEmailType;

class AccountType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstName', 'text')
                ->add('middleName', 'text')
                ->add('lastName', 'text')
                ->add('birthdate', 'date')
                ->add('password', 'password')
                ->add('contactEmail', 'collection', array(
                        'type' => new ContactEmailType(),
                        'allow_add' => true,
                        'by_reference' => false,
                    ))
                ->add('save', 'submit');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'CB\AccountBundle\Entity\Account',
        ));
    }
    
    public function getName() {
        return 'account';
    }

}
