<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 6:13 PM
 */

namespace CB\GrantBundle\Form\Model;


use CB\GrantBundle\Form\Type\GrantCycleType;
use CB\GrantBundle\Form\Type\PhaseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrantTemplate extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('grantCycle', new GrantCycleType(), array(
            'label'=>false,
        ))
            ->add('Save', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\GrantBundle\Entity\Grant',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'grantTemplate';
    }
}