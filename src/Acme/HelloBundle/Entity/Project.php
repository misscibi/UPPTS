<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project
{
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=45, nullable=true)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="project_title", type="string", length=255, nullable=false)
     */
    private $projectTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="project_description", type="string", length=10000, nullable=false)
     */
    private $projectDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="project_duration_months", type="string", length=45, nullable=true)
     */
    private $projectDurationMonths;

    /**
     * @var integer
     *
     * @ORM\Column(name="project_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Account", mappedBy="project")
     */
    private $account;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\GrantCycleInstance", inversedBy="project")
     * @ORM\JoinTable(name="project_under_grant_cycle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     *   }
     * )
     */
    private $grantCycleInstance;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Project", inversedBy="project")
     * @ORM\JoinTable(name="eidr_other_funding",
     *   joinColumns={
     *     @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="funded_project_ID", referencedColumnName="project_ID")
     *   }
     * )
     */
    private $fundedProject;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->account = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grantCycleInstance = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fundedProject = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set status
     *
     * @param string $status
     * @return Project
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set projectTitle
     *
     * @param string $projectTitle
     * @return Project
     */
    public function setProjectTitle($projectTitle)
    {
        $this->projectTitle = $projectTitle;

        return $this;
    }

    /**
     * Get projectTitle
     *
     * @return string 
     */
    public function getProjectTitle()
    {
        return $this->projectTitle;
    }

    /**
     * Set projectDescription
     *
     * @param string $projectDescription
     * @return Project
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;

        return $this;
    }

    /**
     * Get projectDescription
     *
     * @return string 
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }

    /**
     * Set projectDurationMonths
     *
     * @param string $projectDurationMonths
     * @return Project
     */
    public function setProjectDurationMonths($projectDurationMonths)
    {
        $this->projectDurationMonths = $projectDurationMonths;

        return $this;
    }

    /**
     * Get projectDurationMonths
     *
     * @return string 
     */
    public function getProjectDurationMonths()
    {
        return $this->projectDurationMonths;
    }

    /**
     * Get projectId
     *
     * @return integer 
     */
    public function getProjectId()
    {
        return $this->projectId;
    }

    /**
     * Add account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return Project
     */
    public function addAccount(\Acme\HelloBundle\Entity\Account $account)
    {
        $this->account[] = $account;

        return $this;
    }

    /**
     * Remove account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     */
    public function removeAccount(\Acme\HelloBundle\Entity\Account $account)
    {
        $this->account->removeElement($account);
    }

    /**
     * Get account
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Add grantCycleInstance
     *
     * @param \Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return Project
     */
    public function addGrantCycleInstance(\Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance[] = $grantCycleInstance;

        return $this;
    }

    /**
     * Remove grantCycleInstance
     *
     * @param \Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance
     */
    public function removeGrantCycleInstance(\Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance->removeElement($grantCycleInstance);
    }

    /**
     * Get grantCycleInstance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrantCycleInstance()
    {
        return $this->grantCycleInstance;
    }

    /**
     * Add fundedProject
     *
     * @param \Acme\HelloBundle\Entity\Project $fundedProject
     * @return Project
     */
    public function addFundedProject(\Acme\HelloBundle\Entity\Project $fundedProject)
    {
        $this->fundedProject[] = $fundedProject;

        return $this;
    }

    /**
     * Remove fundedProject
     *
     * @param \Acme\HelloBundle\Entity\Project $fundedProject
     */
    public function removeFundedProject(\Acme\HelloBundle\Entity\Project $fundedProject)
    {
        $this->fundedProject->removeElement($fundedProject);
    }

    /**
     * Get fundedProject
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFundedProject()
    {
        return $this->fundedProject;
    }
}
