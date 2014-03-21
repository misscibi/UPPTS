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
                ->add('primaryEmail', new ContactEmailType(), array(
                                        'label'=> 'Email Address'
                ))
                ->add('password', 'password')
                ->add('firstName', 'text')
                ->add('middleName', 'text', array(
                                        'required' => false,
                ))
                ->add('lastName', 'text')
                ->add('birthdate', 'date')
                ->add('contactEmail', 'bootstrap_collection', array(
                                        'label' => 'Alternate Email Address',
                                        'type' => new ContactEmailType(),
                                        'by_reference' => false,
                                        'allow_add' => true,
                                        'allow_delete' => true,
                                        'add_button_text' => 'Add Email',
                                        'delete_button_text' => 'Delete',
                                        'sub_widget_col' => 10,
                                        'button_col' => 2
                    ))
                ->add('save', 'submit');
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
