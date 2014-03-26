<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * PhaseInstance
 *
 * @ORM\Table(name="phase_instance", indexes={@ORM\Index(name="next_phase_instance_ID_idx", columns={"next_phase_instance_ID"}), @ORM\Index(name="previous_phase_instance_ID_idx", columns={"previous_phase_instance_ID"}), @ORM\Index(name="fk_Phase_Instance_Phase1_idx", columns={"phase_ID"}), @ORM\Index(name="fk_Phase_Instance_Grant_Cycle_Instance1_idx", columns={"grant_cycle_instance_ID"})})
 * @ORM\Entity
 */
class PhaseInstance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="phase_instance_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phaseInstanceId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_date", type="datetime", nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_date", type="datetime", nullable=true)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var \CB\GrantBundle\Entity\PhaseInstance
     *
     * @ORM\OneToOne(targetEntity="CB\GrantBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="next_phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $nextPhaseInstance;

    /**
     * @var \CB\GrantBundle\Entity\PhaseInstance
     *
     * @ORM\OneToOne(targetEntity="CB\GrantBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="previous_phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $previousPhaseInstance;

    /**
     * @var \CB\GrantBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $phase;

    /**
     * @var \CB\GrantBundle\Entity\GrantCycleInstance
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\GrantCycleInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     * })
     */
    private $grantCycleInstance;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\AcceptedProjectsInPhase", mappedBy="phaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $acceptedProjectsInPhase;
    
    public function __construct() {         
        $this->acceptedProjectsInPhase = new ArrayCollection();
    }


    /**
     * Get phaseInstanceId
     *
     * @return integer 
     */
    public function getPhaseInstanceId()
    {
        return $this->phaseInstanceId;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return PhaseInstance
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return PhaseInstance
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return PhaseInstance
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set nextPhaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $nextPhaseInstance
     * @return PhaseInstance
     */
    public function setNextPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $nextPhaseInstance = null)
    {
        $this->nextPhaseInstance = $nextPhaseInstance;

        return $this;
    }

    /**
     * Get nextPhaseInstance
     *
     * @return \CB\GrantBundle\Entity\PhaseInstance 
     */
    public function getNextPhaseInstance()
    {
        return $this->nextPhaseInstance;
    }

    /**
     * Set previousPhaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $previousPhaseInstance
     * @return PhaseInstance
     */
    public function setPreviousPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $previousPhaseInstance = null)
    {
        $this->previousPhaseInstance = $previousPhaseInstance;

        return $this;
    }

    /**
     * Get previousPhaseInstance
     *
     * @return \CB\GrantBundle\Entity\PhaseInstance 
     */
    public function getPreviousPhaseInstance()
    {
        return $this->previousPhaseInstance;
    }

    /**
     * Set phase
     *
     * @param \CB\GrantBundle\Entity\Phase $phase
     * @return PhaseInstance
     */
    public function setPhase(\CB\GrantBundle\Entity\Phase $phase = null)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * Get phase
     *
     * @return \CB\GrantBundle\Entity\Phase 
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Set grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return PhaseInstance
     */
    public function setGrantCycleInstance(\CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance = null)
    {
        $this->grantCycleInstance = $grantCycleInstance;

        return $this;
    }

    /**
     * Get grantCycleInstance
     *
     * @return \CB\GrantBundle\Entity\GrantCycleInstance 
     */
    public function getGrantCycleInstance()
    {
        return $this->grantCycleInstance;
    }

    /**
     * Add acceptedProjectsInPhase
     *
     * @param \CB\GrantBundle\Entity\AcceptedProjectsInPhase $acceptedProjectsInPhase
     * @return PhaseInstance
     */
    public function addAcceptedProjectsInPhase(\CB\GrantBundle\Entity\AcceptedProjectsInPhase $acceptedProjectsInPhase)
    {
        $acceptedProjectsInPhase->getPhaseInstance($this);
        $this->acceptedProjectsInPhase[] = $acceptedProjectsInPhase;

        return $this;
    }

    /**
     * Remove acceptedProjectsInPhase
     *
     * @param \CB\GrantBundle\Entity\AcceptedProjectsInPhase $acceptedProjectsInPhase
     */
    public function removeAcceptedProjectsInPhase(\CB\GrantBundle\Entity\AcceptedProjectsInPhase $acceptedProjectsInPhase)
    {
        $this->acceptedProjectsInPhase->removeElement($acceptedProjectsInPhase);
    }

    /**
     * Get acceptedProjectsInPhase
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcceptedProjectsInPhase()
    {
        return $this->acceptedProjectsInPhase;
    }
}
