<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebAdmin
 *
 * @ORM\Table(name="web_admin")
 * @ORM\Entity
 */
class WebAdmin
{
    /**
     * @var \Acme\HelloBundle\Entity\Account
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;



    /**
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return WebAdmin
     */
    public function setAccount(\Acme\HelloBundle\Entity\Account $account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Acme\HelloBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
