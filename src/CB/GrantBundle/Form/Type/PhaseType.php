<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 7:11 PM
 */

namespace CB\GrantBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhaseType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('phaseTitle', 'text', array(
                        'label'=>'Title of Phase',
        ))
            ->add('isOpenToAll', 'checkbox', array(
                        'label'=>'Open To Public?',
                        'attr' => array('align_with_widget'=>true),
                        'required' => false,
            ))
            ->add('grantPhaseRequiredDocument', 'bootstrap_collection', array(

                        'label' => false,
                        'type' => new GrantPhaseRequiredDocumentType(),
                        'add_button_text' => 'Add Documents Required By Proponents For This Phase',
                        'sub_widget_col' => 10,
                        'button_col' => 2,
                        'delete_button_text' => 'Delete',
                        'options' => array('attr' => array('class'=>'well bs-component')),
                        'by_reference' => false,
                        'allow_add' => true,
                        'allow_delete' => true,
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\Phase',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'phase';
    }
} 