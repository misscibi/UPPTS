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
    private $choices = array(
        'Uploaded File',
        'Report Form',
        'EIDR Capsule Proposal Form',
        'EIDR Full Proposal Form',
        'Proposed Budget Form',
        'RDG Form'

    );

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('requiredDocumentsName', 'text', array(
            'label'=>'Name of Required Document',
        ))
            ->add('requiredDocumentsDescription', 'textarea', array(
                'label'=>'Description',
                'required'=>false,
            ))
                ->add('type', 'choice', array(
                'label'=>'Type',
                'required'=>false,
                'choices'=>$this->choices,
                'empty_data'=>'Uploaded',
            ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\GrantPhaseRequiredDocument'
            ))
        ;
    }

    public function getName()
    {
        return 'grantPhaseRequiredDocument';
    }
} 