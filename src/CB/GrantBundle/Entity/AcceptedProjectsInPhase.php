<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcceptedProjectsInPhase
 *
 * @ORM\Table(name="accepted_projects_in_phase", uniqueConstraints={@ORM\UniqueConstraint(name="phase_instance_ID_UNIQUE", columns={"phase_instance_ID", "project_ID"})}, indexes={@ORM\Index(name="fk_Accepted_Projects_In_Phase_Project1_idx", columns={"project_ID"}), @ORM\Index(name="IDX_4C173F5F28CD4E38", columns={"phase_instance_ID"})})
 * @ORM\Entity
 */
class AcceptedProjectsInPhase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Accepted_Projects_In_Phase_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $acceptedProjectsInPhaseId;

    /**
     * @var \CB\GrantBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $phaseInstance;

    /**
     * @var \CB\ProjectBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;



    /**
     * Get acceptedProjectsInPhaseId
     *
     * @return integer 
     */
    public function getAcceptedProjectsInPhaseId()
    {
        return $this->acceptedProjectsInPhaseId;
    }

    /**
     * Set phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return AcceptedProjectsInPhase
     */
    public function setPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance = null)
    {
        $this->phaseInstance = $phaseInstance;

        return $this;
    }

    /**
     * Get phaseInstance
     *
     * @return \CB\GrantBundle\Entity\PhaseInstance 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }

    /**
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return AcceptedProjectsInPhase
     */
    public function setProject(\CB\ProjectBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \CB\ProjectBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }
}
