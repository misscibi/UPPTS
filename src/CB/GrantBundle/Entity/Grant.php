<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Grant
 *
 * @ORM\Table(name="grant")
 * @ORM\Entity
 */
class Grant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantId;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\AccountBundle\Entity\Account", mappedBy="grant")
     * @ORM\JoinTable(name="funder",
     *   joinColumns={
     *     @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     *   }
     * )
     */
    private $funder;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\GrantBundle\Entity\Grant", inversedBy="grant")
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
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\GrantBlacklistType", mappedBy="grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grantBlacklistType;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\GrantSources", mappedBy="grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grantSource;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\GrantCycle", mappedBy="grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grantCycle;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->funder = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grantBlacklist = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grantBlacklistType = new ArrayCollection();
        $this->grantSource = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grantCycle = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add funder
     *
     * @param \CB\AccountBundle\Entity\Account $funder
     * @return Grant
     */
    public function addFunder(\CB\AccountBundle\Entity\Account $funder)
    {
        $this->funder[] = $funder;

        return $this;
    }

    /**
     * Remove funder
     *
     * @param \CB\AccountBundle\Entity\Account $funder
     */
    public function removeFunder(\CB\AccountBundle\Entity\Account $funder)
    {
        $this->funder->removeElement($funder);
    }

    /**
     * Get funder
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFunder()
    {
        return $this->funder;
    }

    /**
     * Add grantBlacklist
     *
     * @param \CB\GrantBundle\Entity\Grant $grantBlacklist
     * @return Grant
     */
    public function addGrantBlacklist(\CB\GrantBundle\Entity\Grant $grantBlacklist)
    {
        $this->grantBlacklist[] = $grantBlacklist;

        return $this;
    }

    /**
     * Remove grantBlacklist
     *
     * @param \CB\GrantBundle\Entity\Grant $grantBlacklist
     */
    public function removeGrantBlacklist(\CB\GrantBundle\Entity\Grant $grantBlacklist)
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
     * Add grantBlacklistType
     *
     * @param \CB\GrantBundle\Entity\GrantBlacklistType $grantBlacklistType
     * @return Grant
     */
    public function addGrantBlacklistType(\CB\GrantBundle\Entity\GrantBlacklistType $grantBlacklistType)
    {
        $this->grantBlacklistType[] = $grantBlacklistType;

        return $this;
    }

    /**
     * Remove grantBlacklistType
     *
     * @param \CB\GrantBundle\Entity\GrantBlacklistType $grantBlacklistType
     */
    public function removeGrantBlacklistType(\CB\GrantBundle\Entity\GrantBlacklistType $grantBlacklistType)
    {
        $this->grantBlacklistType->removeElement($grantBlacklistType);
    }

    /**
     * Get grantBlacklistType
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantBlacklistType()
    {
        return $this->grantBlacklistType;
    }

    /**
     * Add grantSource
     *
     * @param \CB\GrantBundle\Entity\GrantSources $grantSource
     * @return Grant
     */
    public function addGrantSource(\CB\GrantBundle\Entity\GrantSources $grantSource)
    {
        $this->grantSource[] = $grantSource;

        return $this;
    }

    /**
     * Remove grantSource
     *
     * @param \CB\GrantBundle\Entity\GrantSources $grantSource
     */
    public function removeGrantSource(\CB\GrantBundle\Entity\GrantSources $grantSource)
    {
        $this->grantSource->removeElement($grantSource);
    }

    /**
     * Get grantSource
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantSource()
    {
        return $this->grantSource;
    }

    /**
     * Add grantCycle
     *
     * @param \CB\GrantBundle\Entity\GrantCycle $grantCycle
     * @return Grant
     */
    public function addGrantCycle(\CB\GrantBundle\Entity\GrantCycle $grantCycle)
    {
        $this->grantCycle[] = $grantCycle;

        return $this;
    }

    /**
     * Remove grantCycle
     *
     * @param \CB\GrantBundle\Entity\GrantCycle $grantCycle
     */
    public function removeGrantCycle(\CB\GrantBundle\Entity\GrantCycle $grantCycle)
    {
        $this->grantCycle->removeElement($grantCycle);
    }

    /**
     * Get grantCycle
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantCycle()
    {
        return $this->grantCycle;
    }
}
