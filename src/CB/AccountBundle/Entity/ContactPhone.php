<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactPhone
 *
 * @ORM\Table(name="contact_phone", indexes={@ORM\Index(name="fk_Contact_Phone_Account1", columns={"account_ID"})})
 * @ORM\Entity
 * @Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity(fields={"phoneNumber"}, 
 *              message="Someone already registered that phone number. Try another?"
 * )
 */
class ContactPhone
{
    /**
     * @var integer
     *
     * @ORM\Column(name="phone_number_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phoneNumberID;
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone_number", type="string", length=50, unique=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45, nullable=true)
     */
    private $type;

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
     * Set type
     *
     * @param string $type
     * @return ContactPhone
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return ContactPhone
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
     * Get phoneNumberID
     *
     * @return integer 
     */
    public function getPhoneNumberID()
    {
        return $this->phoneNumberID;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return ContactPhone
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string 
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }
}
