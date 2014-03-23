<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GrantToIdTransformer
 *
 * @author Christabel
 */

namespace CB\GrantBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use CB\GrantBundle\Entity\Grant;

class GrantToIdTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }
    
    public function transform($grant)
    {
        if (null === $grant) {
            return 0;
        }
        
        return $grant->getGrantId();
    }

    public function reverseTransform($grantId)
    {
        if (!$grantId) {
            return null;
        }

        $grant = $this->om
            ->getRepository('CBGrantBundle:Grant')
            ->findOneBy(array('grantId' => $grantId))
        ;

        if (null === $grant) {
            throw new TransformationFailedException(sprintf(
                'A grant with id "%d" does not exist!',
                $grantId
            ));
        }

        return $grant;
    }
}