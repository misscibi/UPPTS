<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectMetadata
 *
 * @ORM\Table(name="project_metadata")
 * @ORM\Entity
 */
class ProjectMetadata
{
    /**
     * @var string
     *
     * @ORM\Column(name="abstract", type="string", length=1000, nullable=true)
     */
    private $abstract;

    /**
     * @var string
     *
     * @ORM\Column(name="background", type="string", length=2000, nullable=true)
     */
    private $background;

    /**
     * @var string
     *
     * @ORM\Column(name="objectives", type="string", length=2000, nullable=true)
     */
    private $objectives;

    /**
     * @var string
     *
     * @ORM\Column(name="methodology", type="string", length=2000, nullable=true)
     */
    private $methodology;

    /**
     * @var string
     *
     * @ORM\Column(name="work_plan", type="string", length=2000, nullable=true)
     */
    private $workPlan;

    /**
     * @var \CB\ProjectBundle\Entity\ProjectDocument
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="CB\ProjectBundle\Entity\ProjectDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_document_ID", referencedColumnName="project_document_ID", unique=true)
     * })
     */
    private $projectDocument;



    /**
     * Set abstract
     *
     * @param string $abstract
     * @return ProjectMetadata
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string 
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set background
     *
     * @param string $background
     * @return ProjectMetadata
     */
    public function setBackground($background)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background
     *
     * @return string 
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set objectives
     *
     * @param string $objectives
     * @return ProjectMetadata
     */
    public function setObjectives($objectives)
    {
        $this->objectives = $objectives;

        return $this;
    }

    /**
     * Get objectives
     *
     * @return string 
     */
    public function getObjectives()
    {
        return $this->objectives;
    }

    /**
     * Set methodology
     *
     * @param string $methodology
     * @return ProjectMetadata
     */
    public function setMethodology($methodology)
    {
        $this->methodology = $methodology;

        return $this;
    }

    /**
     * Get methodology
     *
     * @return string 
     */
    public function getMethodology()
    {
        return $this->methodology;
    }

    /**
     * Set workPlan
     *
     * @param string $workPlan
     * @return ProjectMetadata
     */
    public function setWorkPlan($workPlan)
    {
        $this->workPlan = $workPlan;

        return $this;
    }

    /**
     * Get workPlan
     *
     * @return string 
     */
    public function getWorkPlan()
    {
        return $this->workPlan;
    }

    /**
     * Set projectDocument
     *
     * @param \CB\ProjectBundle\Entity\ProjectDocument $projectDocument
     * @return ProjectMetadata
     */
    public function setProjectDocument(\CB\ProjectBundle\Entity\ProjectDocument $projectDocument = null)
    {
        $this->projectDocument = $projectDocument;

        return $this;
    }

    /**
     * Get projectDocument
     *
     * @return \CB\ProjectBundle\Entity\ProjectDocument 
     */
    public function getProjectDocument()
    {
        return $this->projectDocument;
    }
}
