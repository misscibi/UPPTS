<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 9:01 PM
 */

namespace CB\ReviewerBundle\Form\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ReviewerType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('reviewers', 'bootstrap_collection', array(
                'label' => 'Reviewers',
                'type' => 'account_selector',
                'add_button_text' => 'Add Reviewer',
                'sub_widget_col' => 10,
                'button_col' => 2,
                'delete_button_text' => 'Delete',
                'by_reference' => false,
                'allow_add' => true,
                'allow_delete' => true,
            ))
            ->add('Add Reviewers', 'submit');
    }

    public function getName()
    {
        return 'reviewer';
    }
} 