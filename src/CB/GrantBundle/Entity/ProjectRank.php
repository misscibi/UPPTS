<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectRank
 *
 * @ORM\Table(name="project_rank", uniqueConstraints={@ORM\UniqueConstraint(name="project_rank_UNIQUE", columns={"project_rank_number", "phase_instance_ID"})}, indexes={@ORM\Index(name="fk_Project_Rank_Phase_Instance1_idx", columns={"phase_instance_ID"}), @ORM\Index(name="fk_Project_Rank_Project1_idx", columns={"project_ID"})})
 * @ORM\Entity
 */
class ProjectRank
{
    /**
     * @var integer
     *
     * @ORM\Column(name="project_rank_number", type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $projectRankNumber;

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
     * @ORM\Id
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
     * Set phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return ProjectRank
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
     * @return ProjectRank
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
