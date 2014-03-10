<?php

namespace Acme\HelloBundle\Entity;

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
     * @var \Acme\HelloBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;

    /**
     * @var \Acme\HelloBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $phaseInstance;



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
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return AcceptedProjectsInPhase
     */
    public function setProject(\Acme\HelloBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Acme\HelloBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set phaseInstance
     *
     * @param \Acme\HelloBundle\Entity\PhaseInstance $phaseInstance
     * @return AcceptedProjectsInPhase
     */
    public function setPhaseInstance(\Acme\HelloBundle\Entity\PhaseInstance $phaseInstance = null)
    {
        $this->phaseInstance = $phaseInstance;

        return $this;
    }

    /**
     * Get phaseInstance
     *
     * @return \Acme\HelloBundle\Entity\PhaseInstance 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }
}
