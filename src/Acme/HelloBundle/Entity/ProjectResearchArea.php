<?php

namespace Acme\HelloBundle\Entity;

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
     * @var \Acme\HelloBundle\Entity\Project
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
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
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return ProjectResearchArea
     */
    public function setProject(\Acme\HelloBundle\Entity\Project $project)
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
}
