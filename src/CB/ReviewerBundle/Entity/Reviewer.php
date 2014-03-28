<?php

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Reviewer
 *
 * @ORM\Table(name="reviewer",
 *              indexes={@ORM\Index(name="fk_Reviewer_Account1_idx", columns={"account_ID"}), @ORM\Index(name="fk_Reviewer_Project1_idx", columns={"project_ID"})},
 *              uniqueConstraints={@ORM\UniqueConstraint(name="unique_reviewer", columns={"account_ID","project_ID","grant_cycle_instance_ID"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"account", "project","grantCycleInstance"},
 *               message="You have already added one or more of the accounts listed as reviewer.")
 */
class Reviewer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="reviewer_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reviewerId;

    /**
     * @var \CB\AccountBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;

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
     * @var \CB\GrantBundle\Entity\GrantCycleInstance
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\GrantCycleInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     * })
     */
    private $grantCycleInstance;


    /**
     * Get reviewerId
     *
     * @return integer 
     */
    public function getReviewerId()
    {
        return $this->reviewerId;
    }

    /**
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return Reviewer
     */
    public function setAccount(\CB\AccountBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \CB\AccountBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return Reviewer
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

    /**
     * Set grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return Reviewer
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
}
