<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grant
 *
 * @ORM\Table(name="grant")
 * @ORM\Entity
 */
class Grant
{
    /**
     * @var string
     *
     * @ORM\Column(name="grant_name", type="string", length=255, nullable=false)
     */
    private $grantName;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_description", type="string", length=10000, nullable=false)
     */
    private $grantDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_type", type="string", length=45, nullable=true)
     */
    private $grantType;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_amount", type="string", length=45, nullable=true)
     */
    private $grantAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="grant_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Grant", inversedBy="grant")
     * @ORM\JoinTable(name="grant_blacklist_id",
     *   joinColumns={
     *     @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_blacklist_ID", referencedColumnName="grant_ID")
     *   }
     * )
     */
    private $grantBlacklist;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Account", mappedBy="grant")
     */
    private $account;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->grantBlacklist = new \Doctrine\Common\Collections\ArrayCollection();
        $this->account = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set grantName
     *
     * @param string $grantName
     * @return Grant
     */
    public function setGrantName($grantName)
    {
        $this->grantName = $grantName;

        return $this;
    }

    /**
     * Get grantName
     *
     * @return string 
     */
    public function getGrantName()
    {
        return $this->grantName;
    }

    /**
     * Set grantDescription
     *
     * @param string $grantDescription
     * @return Grant
     */
    public function setGrantDescription($grantDescription)
    {
        $this->grantDescription = $grantDescription;

        return $this;
    }

    /**
     * Get grantDescription
     *
     * @return string 
     */
    public function getGrantDescription()
    {
        return $this->grantDescription;
    }

    /**
     * Set grantType
     *
     * @param string $grantType
     * @return Grant
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;

        return $this;
    }

    /**
     * Get grantType
     *
     * @return string 
     */
    public function getGrantType()
    {
        return $this->grantType;
    }

    /**
     * Set grantAmount
     *
     * @param string $grantAmount
     * @return Grant
     */
    public function setGrantAmount($grantAmount)
    {
        $this->grantAmount = $grantAmount;

        return $this;
    }

    /**
     * Get grantAmount
     *
     * @return string 
     */
    public function getGrantAmount()
    {
        return $this->grantAmount;
    }

    /**
     * Get grantId
     *
     * @return integer 
     */
    public function getGrantId()
    {
        return $this->grantId;
    }

    /**
     * Add grantBlacklist
     *
     * @param \Acme\HelloBundle\Entity\Grant $grantBlacklist
     * @return Grant
     */
    public function addGrantBlacklist(\Acme\HelloBundle\Entity\Grant $grantBlacklist)
    {
        $this->grantBlacklist[] = $grantBlacklist;

        return $this;
    }

    /**
     * Remove grantBlacklist
     *
     * @param \Acme\HelloBundle\Entity\Grant $grantBlacklist
     */
    public function removeGrantBlacklist(\Acme\HelloBundle\Entity\Grant $grantBlacklist)
    {
        $this->grantBlacklist->removeElement($grantBlacklist);
    }

    /**
     * Get grantBlacklist
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantBlacklist()
    {
        return $this->grantBlacklist;
    }

    /**
     * Add account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return Grant
     */
    public function addAccount(\Acme\HelloBundle\Entity\Account $account)
    {
        $this->account[] = $account;

        return $this;
    }

    /**
     * Remove account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     */
    public function removeAccount(\Acme\HelloBundle\Entity\Account $account)
    {
        $this->account->removeElement($account);
    }

    /**
     * Get account
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
