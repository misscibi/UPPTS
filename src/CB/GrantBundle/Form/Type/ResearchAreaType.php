<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 1:54 AM
 */

namespace CB\GrantBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ResearchAreaType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('researchAreaTag', 'text', array(
                            'label' => false,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\ResearchArea',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'researchArea';
    }
} 