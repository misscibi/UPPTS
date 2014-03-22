<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RegistrationType
 *
 * @author Christabel
 */

namespace CB\AccountBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AccountRegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('account', new AccountType())
                ->add('terms', 'checkbox', array(
                                    'label' => 'I certify that all the information written are correct.',
                                    'property_path' => 'termsAccepted',
                                    'attr' => array('align_with_widget'=>true),
                    )
        );
        $builder->add('Register', 'submit');
    }

    public function getName()
    {
        return 'accountRegistration';
    }
}