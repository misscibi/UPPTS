<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 6:05 PM
 */

namespace CB\GrantBundle\Form\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProjectToCycleType extends AbstractType {

    private $choices = array();

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('project', 'choice', array(
                'label'=>'Projects To Register For Grant',
                'choices'=>$this->choices,
                'multiple'=>true,
                'expanded'=>true,
                'mapped' => false,
            ))
            ->add('Add Projects', 'submit');
    }

    public function getName()
    {
        return 'projectToCycleType';
    }

    // array object as project entity object
    public function setChoices($array){
        foreach($array as $one) {
            // id - name
            $this->choices[$one->getProjectId()] = $one->getProjectTitle();
        }
    }
} 