<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Phase
 *
 * @ORM\Table(name="phase", indexes={@ORM\Index(name="fk_Phase_Grant_Cycle1_idx", columns={"grant_cycle_ID"})})
 * @ORM\Entity
 */
class Phase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="phase_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phaseId;

    /**
     * @var integer
     *
     * @ORM\Column(name="phase_order", type="integer", nullable=true)
     */
    private $phaseOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="phase_title", type="string", length=255, nullable=true)
     */
    private $phaseTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_open_to_all", type="boolean", nullable=true)
     */
    private $isOpenToAll;

    /**
     * @var \CB\GrantBundle\Entity\GrantCycle
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\GrantCycle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_ID", referencedColumnName="grant_cycle_ID")
     * })
     */
    private $grantCycle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\GrantPhaseRequiredDocument", mappedBy="phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $grantPhaseRequiredDocument;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\PhaseInstance", mappedBy="phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $phaseInstance;

    public function __construct() {
        $this->grantPhaseRequiredDocument = new ArrayCollection();
        $this->phaseInstance = new ArrayCollection();
    }
    
    /**
     * Get phaseId
     *
     * @return integer 
     */
    public function getPhaseId()
    {
        return $this->phaseId;
    }

    /**
     * Set phaseOrder
     *
     * @param integer $phaseOrder
     * @return Phase
     */
    public function setPhaseOrder($phaseOrder)
    {
        $this->phaseOrder = $phaseOrder;

        return $this;
    }

    /**
     * Get phaseOrder
     *
     * @return integer 
     */
    public function getPhaseOrder()
    {
        return $this->phaseOrder;
    }

    /**
     * Set phaseTitle
     *
     * @param string $phaseTitle
     * @return Phase
     */
    public function setPhaseTitle($phaseTitle)
    {
        $this->phaseTitle = $phaseTitle;

        return $this;
    }

    /**
     * Get phaseTitle
     *
     * @return string 
     */
    public function getPhaseTitle()
    {
        return $this->phaseTitle;
    }

    /**
     * Set isOpenToAll
     *
     * @param boolean $isOpenToAll
     * @return Phase
     */
    public function setIsOpenToAll($isOpenToAll)
    {
        $this->isOpenToAll = $isOpenToAll;

        return $this;
    }

    /**
     * Get isOpenToAll
     *
     * @return boolean 
     */
    public function getIsOpenToAll()
    {
        return $this->isOpenToAll;
    }

    /**
     * Set grantCycle
     *
     * @param \CB\GrantBundle\Entity\GrantCycle $grantCycle
     * @return Phase
     */
    public function setGrantCycle(\CB\GrantBundle\Entity\GrantCycle $grantCycle = null)
    {
        $this->grantCycle = $grantCycle;

        return $this;
    }

    /**
     * Get grantCycle
     *
     * @return \CB\GrantBundle\Entity\GrantCycle 
     */
    public function getGrantCycle()
    {
        return $this->grantCycle;
    }

    /**
     * Add grantPhaseRequiredDocument
     *
     * @param \CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantPhaseRequiredDocument
     * @return Phase
     */
    public function addGrantPhaseRequiredDocument(\CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantPhaseRequiredDocument)
    {
        $this->grantPhaseRequiredDocument[] = $grantPhaseRequiredDocument;

        return $this;
    }

    /**
     * Remove grantPhaseRequiredDocument
     *
     * @param \CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantPhaseRequiredDocument
     */
    public function removeGrantPhaseRequiredDocument(\CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantPhaseRequiredDocument)
    {
        $this->grantPhaseRequiredDocument->removeElement($grantPhaseRequiredDocument);
    }

    /**
     * Get grantPhaseRequiredDocument
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantPhaseRequiredDocument()
    {
        return $this->grantPhaseRequiredDocument;
    }

    /**
     * Add phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return Phase
     */
    public function addPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance)
    {
        $this->phaseInstance[] = $phaseInstance;

        return $this;
    }

    /**
     * Remove phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     */
    public function removePhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance)
    {
        $this->phaseInstance->removeElement($phaseInstance);
    }

    /**
     * Get phaseInstance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }
}
