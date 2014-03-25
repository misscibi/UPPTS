<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/26/14
 * Time: 12:03 AM
 */

namespace CB\AccountBundle\Form\Type;


use Symfony\Component\Form\AbstractType;

class CommentsType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('commentTitle', 'text', array(
                'label'=>"Title",
                'required'=>false,
            ))
            ->add('commentDescription', 'textarea', array(
                'label'=>"Message",
            ))
            ->add('submit', 'submit', array(
                'label'=>"Post Comment"
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver
            ->setDefaults(array(
                'data_class' => 'CB\AccountBundle\Entity\Comments',
            ))
        ;
    }

    public function getName()
    {
        return 'comments';
    }
} 