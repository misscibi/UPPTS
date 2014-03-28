<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 6:13 PM
 */

namespace CB\GrantBundle\Form\Model;


use CB\GrantBundle\Form\Type\PhaseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantTemplate extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('grantCycleTitle', 'text', array(
            'label'=>'Title of This Cycle',
        ))
            ->add('phase', 'bootstrap_collection', array(
                'label' => 'Phases',
                'type' => new PhaseType(),
                'add_button_text' => 'Add Phase',
                'sub_widget_col' => 10,
                'button_col' => 2,
                'delete_button_text' => 'Delete',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('Save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\GrantCycle',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'grantTemplate';
    }
}