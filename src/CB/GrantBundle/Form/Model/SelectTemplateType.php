<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/28/14
 * Time: 6:39 PM
 */

namespace CB\GrantBundle\Form\Model;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SelectTemplateType extends AbstractType {

    private $choices = array();

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('template', 'choice', array(
                'label'=>false,
                'choices'=>$this->choices,
                'multiple'=>false,
                'expanded'=>true,
                'mapped' => false,
            ))
            ->add('Next', 'submit');
    }

    public function getName()
    {
        return 'selectTemplateType';
    }

    // array object as project entity object
    public function setChoices($array){
        foreach($array as $one) {
            // id - name
            $this->choices[$one->getGrantCycleId()] = $one->getGrantCycleTitle();
        }
    }
} 