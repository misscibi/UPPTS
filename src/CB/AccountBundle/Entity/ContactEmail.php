<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactEmail
 *
 * @ORM\Table(name="contact_email", indexes={@ORM\Index(name="fk_Contact_Email_Account1", columns={"account_ID"})})
 * @ORM\Entity
 */
class ContactEmail
{
    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailAddress;

    /**
     * @var \CB\AccountBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;



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
     * @param \CB\AccountBundle\Entity\Account $account
     * @return ContactEmail
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
