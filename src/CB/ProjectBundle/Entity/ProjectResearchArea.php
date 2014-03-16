<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectResearchArea
 *
 * @ORM\Table(name="project_research_area", indexes={@ORM\Index(name="IDX_56B59ABEB8871BF6", columns={"project_ID"})})
 * @ORM\Entity
 */
class ProjectResearchArea
{
    /**
     * @var string
     *
     * @ORM\Column(name="research_area_tag", type="string", length=255)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $researchAreaTag;

    /**
     * @var \CB\ProjectBundle\Entity\Project
     *
     * @ORM\OneToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID", unique=true)
     * })
     */
    private $project;



    /**
     * Set researchAreaTag
     *
     * @param string $researchAreaTag
     * @return ProjectResearchArea
     */
    public function setResearchAreaTag($researchAreaTag)
    {
        $this->researchAreaTag = $researchAreaTag;

        return $this;
    }

    /**
     * Get researchAreaTag
     *
     * @return string 
     */
    public function getResearchAreaTag()
    {
        return $this->researchAreaTag;
    }

    /**
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return ProjectResearchArea
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
