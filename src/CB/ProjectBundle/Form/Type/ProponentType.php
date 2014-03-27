<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 3:33 PM
 */

namespace CB\ProjectBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProponentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('account', 'account_selector', array(
                'label'=>'Account ID'
            ))
            ->add('role', 'text', array(
            'label'=>'Role in Project',
        ))
            ->add('affiliation', 'textarea', array(
                'label'=>'Affiliation',
            ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\ProjectBundle\Entity\Proponent',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'proponent';
    }
}