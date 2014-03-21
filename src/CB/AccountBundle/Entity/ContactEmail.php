<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * ContactEmail
 *
 * @ORM\Table(name="contact_email")
 * @ORM\Entity
 * @UniqueEntity(fields={"emailAddress"}, 
 *              message="Someone already registered that email address or you have it in one of your alternate email addresses. Try deleting your alternate or enter another email address."
 * )
 */
class ContactEmail
{    
    /**
     * @var integer
     * 
     * @ORM\Column(name="email_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $emailID;
    
    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=255)
     */
    private $emailAddress;

    /**
     * @var \CB\AccountBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Account", inversedBy="contactEmail", cascade={"ALL"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    protected $account;

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

    /**
     * Set emailID
     *
     * @param integer $emailID
     * @return ContactEmail
     */
    public function setEmailID($emailID)
    {
        $this->emailID = $emailID;

        return $this;
    }

    /**
     * Get emailID
     *
     * @return integer 
     */
    public function getEmailID()
    {
        return $this->emailID;
    }
}
