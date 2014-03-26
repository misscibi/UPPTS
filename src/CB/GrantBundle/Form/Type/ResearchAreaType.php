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

class GrantCycleInstanceType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('priorityResearchArea', 'bootstrap_collection', array(
                'label' => false,
                'type' => new ResearchAreaType(),
                'add_button_text' => 'Add Research Area',
                'sub_widget_col' => 10,
                'button_col' => 2,
                'delete_button_text' => 'Delete',
                'options' => array('attr' => array('class'=>'well bs-component')),
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('phaseInstance', 'bootstrap_collection', array(
                'label' => false,
                'type' => new PhaseInstanceType(),
                'sub_widget_col' => 10,
                'button_col' => 2,
                'options' => array('attr' => array('class'=>'well bs-component')),
                'by_reference' => false,
                'allow_add' => false,
                'allow_delete' => false,
            ))
            ->add('Add Instance', 'submit');
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