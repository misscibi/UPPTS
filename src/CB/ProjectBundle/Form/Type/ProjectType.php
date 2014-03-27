<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 3:15 PM
 */

namespace CB\ProjectBundle\Form\Type;


use CB\GrantBundle\Form\Type\ResearchAreaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('projectTitle', 'text', array(
            'label'=>'Project Title',
        ))
            ->add('projectDescription', 'textarea', array(
                'label'=>'Description',
            ))
            ->add('projectDurationMonths', 'integer', array(
                'label'=>'Project Duration (in months)'
            ))
            ->add('projectResearchArea', 'bootstrap_collection', array(
                'label'=>'Research Areas',
                'type' => new ResearchAreaType(),
                'add_button_text' => 'Add Research Area',
                'sub_widget_col' => 10,
                'button_col' => 2,
                'delete_button_text' => 'Delete',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('proponent', 'bootstrap_collection', array(
                'label'=>'Proponent',
                'type' => new ProponentType(),
                'add_button_text' => 'Add Proponent',
                'sub_widget_col' => 10,
                'button_col' => 2,
                'options' => array('attr' => array('class'=>'well bs-component')),
                'delete_button_text' => 'Delete',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
                'cascade_validation' => true,
            ))
            ->add('Add Project', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\ProjectBundle\Entity\Project',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'project';
    }
}
