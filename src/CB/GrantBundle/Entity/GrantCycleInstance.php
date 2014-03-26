<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\EventListener\ResizeFormListener;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

/**
 * GrantCycleInstance
 *
 * @ORM\Table(name="grant_cycle_instance", indexes={@ORM\Index(name="fk_Grant_Cycle_Instance_Grant_Cycle1_idx", columns={"grant_cycle_ID"})})
 * @ORM\Entity
 */
class GrantCycleInstance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_cycle_instance_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantCycleInstanceId;

    /**
     * @var \CB\GrantBundle\Entity\GrantCycle
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\GrantCycle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_ID", referencedColumnName="grant_cycle_ID")
     * })
     */
    private $grantCycle;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\ProjectBundle\Entity\Project", mappedBy="grantCycleInstance", cascade={"ALL"})
     * @ORM\JoinTable(name="project_under_grant_cycle",
     *   joinColumns={
     *     @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     *   }
     * )
     */
    private $project;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\GrantBundle\Entity\PhaseInstance", mappedBy="grantCycleInstance", cascade={"ALL"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     * })
     */
    private $phaseInstance;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\GrantBundle\Entity\ResearchArea", inversedBy="grantCycleInstance", cascade={"ALL"})
     * @ORM\JoinTable(name="grant_cycle_under_research_area",
     *   joinColumns={
     *     @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="research_area_tag", referencedColumnName="research_area_tag")
     *   }
     * )
     */
    private $researchArea;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phaseInstance = new ArrayCollection();
        $this->researchArea = new ArrayCollection();
    }


    /**
     * Get grantCycleInstanceId
     *
     * @return integer 
     */
    public function getGrantCycleInstanceId()
    {
        return $this->grantCycleInstanceId;
    }

    /**
     * Set grantCycle
     *
     * @param \CB\GrantBundle\Entity\GrantCycle $grantCycle
     * @return GrantCycleInstance
     */
    public function setGrantCycle(\CB\GrantBundle\Entity\GrantCycle $grantCycle = null)
    {
        $this->grantCycle = $grantCycle;

        return $this;
    }

    /**
     * Get grantCycle
     *
     * @return \CB\GrantBundle\Entity\GrantCycle 
     */
    public function getGrantCycle()
    {
        return $this->grantCycle;
    }

    /**
     * Add project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return GrantCycleInstance
     */
    public function addProject(\CB\ProjectBundle\Entity\Project $project)
    {
        $project->addGrantCycleInstance($this);
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     */
    public function removeProject(\CB\ProjectBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return GrantCycleInstance
     */
    public function addPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance)
    {
        $phaseInstance->setGrantCycleInstance($this);
        $this->phaseInstance[] = $phaseInstance;

        return $this;
    }

    /**
     * Remove phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     */
    public function removePhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance)
    {
        $this->phaseInstance->removeElement($phaseInstance);
    }

    /**
     * Get phaseInstance
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }

    /**
     * Add researchArea
     *
     * @param \CB\GrantBundle\Entity\ResearchArea $researchArea
     * @return GrantCycleInstance
     */
    public function addResearchAreon(\CB\GrantBundle\Entity\ResearchArea $researchArea)
    {
        $this->researchArea[] = $researchArea;
        $researchArea->addGrantCycleInstance($this);

        return $this;
    }

    /**
     * Remove researchArea
     *
     * @param \CB\GrantBundle\Entity\ResearchArea $researchArea
     */
    public function removeResearchAreon(\CB\GrantBundle\Entity\ResearchArea $researchArea)
    {
        $this->researchArea->removeElement($researchArea);
    }

    /**
     * Get researchArea
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getResearchArea()
    {
        return $this->researchArea;
    }

}
