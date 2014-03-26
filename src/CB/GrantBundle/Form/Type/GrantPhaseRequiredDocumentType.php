<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 7:16 PM
 */

namespace CB\GrantBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantPhaseRequiredDocumentType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('requiredDocumentsName', 'text', array(
            'label'=>'Name of Required Document',
        ))
            ->add('requiredDocumentsDescription', 'textarea', array(
                'label'=>'Description',
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\GrantPhaseRequiredDocument',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'grantPhaseRequiredDocument';
    }
} 