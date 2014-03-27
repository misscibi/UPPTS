<?php
/**
 * Created by PhpStorm.
 * User: Christabel
 * Date: 3/27/14
 * Time: 3:40 PM
 */

namespace CB\AccountBundle\Form\DataTransformer;


use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;

class AccountToIdTransformer implements DataTransformerInterface
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

    public function transform($account)
    {
        if (null === $account) {
            return 0;
        }

        return $account->getAccountId();
    }

    public function reverseTransform($accountId)
    {
        if (!$accountId) {
            return null;
        }

        $account = $this->om
            ->getRepository('CBAccountBundle:Account')
            ->findOneBy(array('accountId' => $accountId))
        ;

        if (null === $account) {
            throw new TransformationFailedException(sprintf(
                'An account with id "%d" does not exist!',
                $accountId
            ));
        }

        return $account;
    }
}