<?php

namespace Acme\HelloBundle\Entity;

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
     * @ORM\Column(name="publication_reference_ID", type="integer", nullable=true)
     */
    private $publicationReferenceId;

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
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return Bibliography
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
