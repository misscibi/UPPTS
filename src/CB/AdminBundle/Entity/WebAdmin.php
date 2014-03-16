<?php

namespace CB\AdminBundle\Entity;

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
     * @var \CB\AccountBundle\Entity\Account
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="CB\AccountBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID", unique=true)
     * })
     */
    private $account;



    /**
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return WebAdmin
     */
    public function setAccount(\CB\AccountBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \CB\AccountBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
