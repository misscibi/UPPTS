<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/29/14
 * Time: 1:08 AM
 */

namespace CB\ReviewerBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReviewType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('reviewTitle', 'text', array(
                'label'=>'Title',
            ))
            ->add('reviewDescription', 'textarea', array(
                'label'=>'Description',
                /*
                'attr'=>(array('rows'=>5))
                */
            ))
            ->add('reviewRating', 'integer', array(
                'label'=>'Review Rating (10-highest)',
            ))
            ->add('Submit Review', 'submit');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\ReviewerBundle\Entity\Review',
                'cascade_validation' => true,
            ))
        ;
    }

    public function getName()
    {
        return 'review';
    }
} 