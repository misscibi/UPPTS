<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 6:47 PM
 */

namespace CB\GrantBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantCycleType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('grantCycleTitle', 'text', array(
                                        'label'=>'Title',
        ))
                ->add('phase', 'bootstrap_collection', array(

                                            'label' => false,
                                            'type' => new PhaseType(),
                                            'add_button_text' => 'Add Phase',
                                            'sub_widget_col' => 10,
                                            'button_col' => 2,
                                            'delete_button_text' => 'Delete',
                                            'options' => array('attr' => array('class'=>'well bs-component')),
                                            'by_reference' => false,
                                            'allow_add' => true,
                                            'allow_delete' => true,
                ))

                ->add('Submit', 'submit');
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
        return 'grantCycle';
    }
} 