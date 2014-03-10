<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reviewer
 *
 * @ORM\Table(name="reviewer", indexes={@ORM\Index(name="fk_Reviewer_Account1_idx", columns={"account_ID"}), @ORM\Index(name="fk_Reviewer_Project1_idx", columns={"project_ID"})})
 * @ORM\Entity
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
     * @var \Acme\HelloBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;

    /**
     * @var \Acme\HelloBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;



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
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return Reviewer
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
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return Reviewer
     */
    public function setAccount(\Acme\HelloBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Acme\HelloBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
