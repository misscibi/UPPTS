<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectReadyForReview
 *
 * @ORM\Table(name="project_ready_for_review", uniqueConstraints={@ORM\UniqueConstraint(name="project_ID_UNIQUE", columns={"project_ID", "phase_instance_ID"})}, indexes={@ORM\Index(name="fk_Project_Ready_For_Review_Phase_Instance1_idx", columns={"phase_instance_ID"}), @ORM\Index(name="IDX_5936BCAAB8871BF6", columns={"project_ID"})})
 * @ORM\Entity
 */
class ProjectReadyForReview
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Project_Ready_For_Review_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectReadyForReviewId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_timestamp", type="datetime", nullable=true)
     */
    private $createTimestamp;

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
     * Get projectReadyForReviewId
     *
     * @return integer 
     */
    public function getProjectReadyForReviewId()
    {
        return $this->projectReadyForReviewId;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return ProjectReadyForReview
     */
    public function setCreateTimestamp($createTimestamp)
    {
        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * Get createTimestamp
     *
     * @return \DateTime 
     */
    public function getCreateTimestamp()
    {
        return $this->createTimestamp;
    }

    /**
     * Set phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return ProjectReadyForReview
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
     * @return ProjectReadyForReview
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
