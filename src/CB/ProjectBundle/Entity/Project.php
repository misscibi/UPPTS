<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Project
 *
 * @ORM\Table(name="project")
 * @ORM\Entity
 */
class Project
{
    /**
     * @var integer
     *
     * @ORM\Column(name="project_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectId;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\ProjectBundle\Entity\Project", inversedBy="project")
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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\GrantBundle\Entity\GrantCycleInstance", inversedBy="project")
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
     * @ORM\OneToMany(targetEntity="CB\ProjectBundle\Entity\Proponent", mappedBy="project")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $proponent;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ProjectBundle\Entity\ProjectReadyForReview", mappedBy="project")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $projectReadyForReview;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ProjectBundle\Entity\ProjectResearchArea", mappedBy="project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $projectResearchArea;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ReviewerBundle\Entity\Reviewer", mappedBy="project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $reviewer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fundedProject = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grantCycleInstance = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proponent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->projectReadyForReview = new ArrayCollection();
        $this->projectResearchArea = new ArrayCollection();
        $this->reviewer = new ArrayCollection();
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
     * Add fundedProject
     *
     * @param \CB\ProjectBundle\Entity\Project $fundedProject
     * @return Project
     */
    public function addFundedProject(\CB\ProjectBundle\Entity\Project $fundedProject)
    {
        $this->fundedProject[] = $fundedProject;

        return $this;
    }

    /**
     * Remove fundedProject
     *
     * @param \CB\ProjectBundle\Entity\Project $fundedProject
     */
    public function removeFundedProject(\CB\ProjectBundle\Entity\Project $fundedProject)
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

    /**
     * Add grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return Project
     */
    public function addGrantCycleInstance(\CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance[] = $grantCycleInstance;

        return $this;
    }

    /**
     * Remove grantCycleInstance
     *
     * @param \CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance
     */
    public function removeGrantCycleInstance(\CB\GrantBundle\Entity\GrantCycleInstance $grantCycleInstance)
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
     * Add proponent
     *
     * @param \CB\ProjectBundle\Entity\Proponent $proponent
     * @return Project
     */
    public function addProponent(\CB\ProjectBundle\Entity\Proponent $proponent)
    {
        $this->proponent[] = $proponent;

        return $this;
    }

    /**
     * Remove proponent
     *
     * @param \CB\ProjectBundle\Entity\Proponent $proponent
     */
    public function removeProponent(\CB\ProjectBundle\Entity\Proponent $proponent)
    {
        $this->proponent->removeElement($proponent);
    }

    /**
     * Get proponent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProponent()
    {
        return $this->proponent;
    }

    /**
     * Add projectReadyForReview
     *
     * @param \CB\ProjectBundle\Entity\ProjectReadyForReview $projectReadyForReview
     * @return Project
     */
    public function addProjectReadyForReview(\CB\ProjectBundle\Entity\ProjectReadyForReview $projectReadyForReview)
    {
        $this->projectReadyForReview[] = $projectReadyForReview;

        return $this;
    }

    /**
     * Remove projectReadyForReview
     *
     * @param \CB\ProjectBundle\Entity\ProjectReadyForReview $projectReadyForReview
     */
    public function removeProjectReadyForReview(\CB\ProjectBundle\Entity\ProjectReadyForReview $projectReadyForReview)
    {
        $this->projectReadyForReview->removeElement($projectReadyForReview);
    }

    /**
     * Get projectReadyForReview
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectReadyForReview()
    {
        return $this->projectReadyForReview;
    }

    /**
     * Add projectResearchArea
     *
     * @param \CB\ProjectBundle\Entity\ProjectResearchArea $projectResearchArea
     * @return Project
     */
    public function addProjectResearchArea(\CB\ProjectBundle\Entity\ProjectResearchArea $projectResearchArea)
    {
        $this->projectResearchArea[] = $projectResearchArea;

        return $this;
    }

    /**
     * Remove projectResearchArea
     *
     * @param \CB\ProjectBundle\Entity\ProjectResearchArea $projectResearchArea
     */
    public function removeProjectResearchArea(\CB\ProjectBundle\Entity\ProjectResearchArea $projectResearchArea)
    {
        $this->projectResearchArea->removeElement($projectResearchArea);
    }

    /**
     * Get projectResearchArea
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectResearchArea()
    {
        return $this->projectResearchArea;
    }

    /**
     * Add reviewer
     *
     * @param \CB\ReviewerBundle\Entity\Reviewer $reviewer
     * @return Project
     */
    public function addReviewer(\CB\ReviewerBundle\Entity\Reviewer $reviewer)
    {
        $this->reviewer[] = $reviewer;

        return $this;
    }

    /**
     * Remove reviewer
     *
     * @param \CB\ReviewerBundle\Entity\Reviewer $reviewer
     */
    public function removeReviewer(\CB\ReviewerBundle\Entity\Reviewer $reviewer)
    {
        $this->reviewer->removeElement($reviewer);
    }

    /**
     * Get reviewer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }
}
