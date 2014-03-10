<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRank
 *
 * @ORM\Table(name="project_rank", indexes={@ORM\Index(name="fk_Project_Rank_Phase_Instance1_idx", columns={"phase_instance_ID"}), @ORM\Index(name="fk_Project_Rank_Project1_idx", columns={"project_ID"})})
 * @ORM\Entity
 */
class ProjectRank
{
    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var integer
     *
     * @ORM\Column(name="project_rank_number", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $projectRankNumber;

    /**
     * @var \Acme\HelloBundle\Entity\PhaseInstance
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $phaseInstance;

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
     * Set notes
     *
     * @param string $notes
     * @return ProjectRank
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
     * Set projectRankNumber
     *
     * @param integer $projectRankNumber
     * @return ProjectRank
     */
    public function setProjectRankNumber($projectRankNumber)
    {
        $this->projectRankNumber = $projectRankNumber;

        return $this;
    }

    /**
     * Get projectRankNumber
     *
     * @return integer 
     */
    public function getProjectRankNumber()
    {
        return $this->projectRankNumber;
    }

    /**
     * Set phaseInstance
     *
     * @param \Acme\HelloBundle\Entity\PhaseInstance $phaseInstance
     * @return ProjectRank
     */
    public function setPhaseInstance(\Acme\HelloBundle\Entity\PhaseInstance $phaseInstance)
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

    /**
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return ProjectRank
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
}
