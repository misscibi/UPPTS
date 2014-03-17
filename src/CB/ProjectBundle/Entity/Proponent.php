<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proponent
 *
 * @author Christabel
 */

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Proponent
 * 
 * @ORM\Table(name="proponent")
 * @ORM\Entity
 */

class Proponent {
    /**
     * @var string
     * 
     * @ORM\Column(name="role", type="string", length=45, nullable=true)
     */
    private $role;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="reason_for_applying", type="string", length=2000, nullable=true)
     */
    private $reasonForApplying;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="activities", type="string", length=2000, nullable=true)
     */
    private $activities;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="conflicts", type="string", length=2000, nullable=true)
     */
    private $conflicts;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="affiliation", type="string", length=1000, nullable=true)
     * 
     */
    private $affiliation;
    
    /**
     * @var \CB\AccountBundle\Entity\Account
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Account")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;
    
    /**
     * @var \CB\ProjectBundle\Entity\Project
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;
    
    public function __construct() {
        $this->account = new ArrayCollection();
        $this->project = new ArrayCollection();
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Proponent
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set reasonForApplying
     *
     * @param string $reasonForApplying
     * @return Proponent
     */
    public function setReasonForApplying($reasonForApplying)
    {
        $this->reasonForApplying = $reasonForApplying;

        return $this;
    }

    /**
     * Get reasonForApplying
     *
     * @return string 
     */
    public function getReasonForApplying()
    {
        return $this->reasonForApplying;
    }

    /**
     * Set activities
     *
     * @param string $activities
     * @return Proponent
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;

        return $this;
    }

    /**
     * Get activities
     *
     * @return string 
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set conflicts
     *
     * @param string $conflicts
     * @return Proponent
     */
    public function setConflicts($conflicts)
    {
        $this->conflicts = $conflicts;

        return $this;
    }

    /**
     * Get conflicts
     *
     * @return string 
     */
    public function getConflicts()
    {
        return $this->conflicts;
    }

    /**
     * Set affiliation
     *
     * @param string $affiliation
     * @return Proponent
     */
    public function setAffiliation($affiliation)
    {
        $this->affiliation = $affiliation;

        return $this;
    }

    /**
     * Get affiliation
     *
     * @return string 
     */
    public function getAffiliation()
    {
        return $this->affiliation;
    }

    /**
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return Proponent
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
     * @return Proponent
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
