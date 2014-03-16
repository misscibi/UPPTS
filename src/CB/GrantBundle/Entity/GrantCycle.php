<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantCycle
 *
 * @ORM\Table(name="grant_cycle", indexes={@ORM\Index(name="fk_Grant_Cycle_Grant1_idx", columns={"grant_ID"})})
 * @ORM\Entity
 */
class GrantCycle
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_cycle_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantCycleId;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_cycle_title", type="string", length=255, nullable=false)
     */
    private $grantCycleTitle;

    /**
     * @var \CB\GrantBundle\Entity\Grant
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\Grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grant;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\Phase", mappedBy="grantCycle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $phase;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\GrantCycleInstance", mappedBy="grantCycle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grantCycleInstance;
    
    public function __construct() {
        $this->phase = new ArrayCollection();
        $this->grantCycleInstance = new ArrayCollection();
    }

    /**
     * Get grantCycleId
     *
     * @return integer 
     */
    public function getGrantCycleId()
    {
        return $this->grantCycleId;
    }

    /**
     * Set grantCycleTitle
     *
     * @param string $grantCycleTitle
     * @return GrantCycle
     */
    public function setGrantCycleTitle($grantCycleTitle)
    {
        $this->grantCycleTitle = $grantCycleTitle;

        return $this;
    }

    /**
     * Get grantCycleTitle
     *
     * @return string 
     */
    public function getGrantCycleTitle()
    {
        return $this->grantCycleTitle;
    }

    /**
     * Set grant
     *
     * @param \CB\GrantBundle\Entity\Grant $grant
     * @return GrantCycle
     */
    public function setGrant(\CB\GrantBundle\Entity\Grant $grant = null)
    {
        $this->grant = $grant;

        return $this;
    }

    /**
     * Get grant
     *
     * @return \CB\GrantBundle\Entity\Grant 
     */
    public function getGrant()
    {
        return $this->grant;
    }

    /**
     * Add phase
     *
     * @param \CB\GrantBundle\Entity\Phase $phase
     * @return GrantCycle
     */
    public function addPhase(\CB\GrantBundle\Entity\Phase $phase)
    {
        $this->phase[] = $phase;

        return $this;
    }

    /**
     * Remove phase
     *
     * @param \CB\GrantBundle\Entity\Phase $phase
     */
    public function removePhase(\CB\GrantBundle\Entity\Phase $phase)
    {
        $this->phase->removeElement($phase);
    }

    /**
     * Get phase
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Add grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return GrantCycle
     */
    public function addGrantCycleInstance(\CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance[] = $grantCycleInstance;

        return $this;
    }

    /**
     * Remove grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     */
    public function removeGrantCycleInstance(\CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance->removeElement($grantCycleInstance);
    }

    /**
     * Get grantCycleInstance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantCycleInstance()
    {
        return $this->grantCycleInstance;
    }
}
