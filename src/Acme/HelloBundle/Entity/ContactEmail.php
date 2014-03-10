<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactEmail
 *
 * @ORM\Table(name="contact_email", uniqueConstraints={@ORM\UniqueConstraint(name="email_address_UNIQUE", columns={"email_address"})}, indexes={@ORM\Index(name="IDX_CAB86C7B35815BD0", columns={"account_ID"})})
 * @ORM\Entity
 */
class ContactEmail
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_primary", type="boolean", nullable=false)
     */
    private $isPrimary;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $emailAddress;

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
     * Set isPrimary
     *
     * @param boolean $isPrimary
     * @return ContactEmail
     */
    public function setIsPrimary($isPrimary)
    {
        $this->isPrimary = $isPrimary;

        return $this;
    }

    /**
     * Get isPrimary
     *
     * @return boolean 
     */
    public function getIsPrimary()
    {
        return $this->isPrimary;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return ContactEmail
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return ContactEmail
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
