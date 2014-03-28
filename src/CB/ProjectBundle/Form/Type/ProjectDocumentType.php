<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 2:34 PM
 */

namespace CB\ProjectBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectDocumentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('documentTitle', 'text', array(
                'label'=>'File Name',
            ))
            ->add('file', 'file', array(
                'label'=>'Upload',
            ))
            ->add('submit', 'submit')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\ProjectBundle\Entity\ProjectDocument',
            ))
        ;
    }

    public function getName()
    {
        return 'projectDocument';
    }

}
