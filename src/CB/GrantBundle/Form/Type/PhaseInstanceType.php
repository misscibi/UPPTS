<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 2:16 AM
 */

namespace CB\GrantBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhaseInstanceType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('startDate', 'datetime', array(
                                        'label' => "Start Date",
            ))
            ->add('endDate', 'datetime', array(
                                        'label' => "End Date",
            ))
            ->add('notes', 'textarea', array(
                                        'label' => "Notes",
                                        'required'=>false,
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\PhaseInstance',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'phaseInstance';
    }
} 