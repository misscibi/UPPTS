<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhaseInstance
 *
 * @ORM\Table(name="phase_instance", indexes={@ORM\Index(name="next_phase_instance_ID_idx", columns={"next_phase_instance_ID"}), @ORM\Index(name="previous_phase_instance_ID_idx", columns={"previous_phase_instance_ID"}), @ORM\Index(name="fk_Phase_Instance_Phase1_idx", columns={"phase_ID"}), @ORM\Index(name="fk_Phase_Instance_Grant_Cycle_Instance1_idx", columns={"grant_cycle_instance_ID"})})
 * @ORM\Entity
 */
class PhaseInstance
{
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
     * @var integer
     *
     * @ORM\Column(name="phase_instance_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phaseInstanceId;

    /**
     * @var \Acme\HelloBundle\Entity\GrantCycleInstance
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\GrantCycleInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     * })
     */
    private $grantCycleInstance;

    /**
     * @var \Acme\HelloBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $phase;

    /**
     * @var \Acme\HelloBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="previous_phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $previousPhaseInstance;

    /**
     * @var \Acme\HelloBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="next_phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $nextPhaseInstance;



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
     * Get phaseInstanceId
     *
     * @return integer 
     */
    public function getPhaseInstanceId()
    {
        return $this->phaseInstanceId;
    }

    /**
     * Set grantCycleInstance
     *
     * @param \Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return PhaseInstance
     */
    public function setGrantCycleInstance(\Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance = null)
    {
        $this->grantCycleInstance = $grantCycleInstance;

        return $this;
    }

    /**
     * Get grantCycleInstance
     *
     * @return \Acme\HelloBundle\Entity\GrantCycleInstance 
     */
    public function getGrantCycleInstance()
    {
        return $this->grantCycleInstance;
    }

    /**
     * Set phase
     *
     * @param \Acme\HelloBundle\Entity\Phase $phase
     * @return PhaseInstance
     */
    public function setPhase(\Acme\HelloBundle\Entity\Phase $phase = null)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * Get phase
     *
     * @return \Acme\HelloBundle\Entity\Phase 
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * Set previousPhaseInstance
     *
     * @param \Acme\HelloBundle\Entity\PhaseInstance $previousPhaseInstance
     * @return PhaseInstance
     */
    public function setPreviousPhaseInstance(\Acme\HelloBundle\Entity\PhaseInstance $previousPhaseInstance = null)
    {
        $this->previousPhaseInstance = $previousPhaseInstance;

        return $this;
    }

    /**
     * Get previousPhaseInstance
     *
     * @return \Acme\HelloBundle\Entity\PhaseInstance 
     */
    public function getPreviousPhaseInstance()
    {
        return $this->previousPhaseInstance;
    }

    /**
     * Set nextPhaseInstance
     *
     * @param \Acme\HelloBundle\Entity\PhaseInstance $nextPhaseInstance
     * @return PhaseInstance
     */
    public function setNextPhaseInstance(\Acme\HelloBundle\Entity\PhaseInstance $nextPhaseInstance = null)
    {
        $this->nextPhaseInstance = $nextPhaseInstance;

        return $this;
    }

    /**
     * Get nextPhaseInstance
     *
     * @return \Acme\HelloBundle\Entity\PhaseInstance 
     */
    public function getNextPhaseInstance()
    {
        return $this->nextPhaseInstance;
    }
}
