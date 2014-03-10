<?php

namespace Acme\HelloBundle\Entity;

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
     * @var \DateTime
     *
     * @ORM\Column(name="create_timestamp", type="datetime", nullable=true)
     */
    private $createTimestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="Project_Ready_For_Review_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectReadyForReviewId;

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
     * Get projectReadyForReviewId
     *
     * @return integer 
     */
    public function getProjectReadyForReviewId()
    {
        return $this->projectReadyForReviewId;
    }

    /**
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return ProjectReadyForReview
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
     * @return ProjectReadyForReview
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
