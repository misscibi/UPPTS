<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bibliography
 *
 * @ORM\Table(name="bibliography")
 * @ORM\Entity
 */
class Bibliography
{
    /**
     * @var integer
     *
     * @ORM\Column(name="publication_ID", type="integer", nullable=true)
     */
    private $publicationId;

    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="publication_reference_ID", type="integer", nullable=true)
     */
    private $publicationReferenceId;

    /**
     * @var \CB\ProjectBundle\Entity\Project
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID", unique=true)
     * })
     */
    private $project;



    /**
     * Set publicationId
     *
     * @param integer $publicationId
     * @return Bibliography
     */
    public function setPublicationId($publicationId)
    {
        $this->publicationId = $publicationId;

        return $this;
    }

    /**
     * Get publicationId
     *
     * @return integer 
     */
    public function getPublicationId()
    {
        return $this->publicationId;
    }

    /**
     * Set publicationReferenceId
     *
     * @param integer $publicationReferenceId
     * @return Bibliography
     */
    public function setPublicationReferenceId($publicationReferenceId)
    {
        $this->publicationReferenceId = $publicationReferenceId;

        return $this;
    }

    /**
     * Get publicationReferenceId
     *
     * @return integer 
     */
    public function getPublicationReferenceId()
    {
        return $this->publicationReferenceId;
    }

    /**
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return Bibliography
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
