<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjectDocument
 *
 * @ORM\Table(name="project_document", indexes={@ORM\Index(name="fk_Project_Document_Proponent1_idx", columns={"created_by_author"}), @ORM\Index(name="fk_Project_Document_Proponent2_idx", columns={"updated_by_author"}), @ORM\Index(name="fk_Project_Document_Grant_Phase_Required_Document1_idx", columns={"grant_document_ID"}), @ORM\Index(name="fk_Project_Document_Project1_idx", columns={"project_ID"})})
 * @ORM\Entity
 */
class ProjectDocument
{
    /**
     * @var string
     *
     * @ORM\Column(name="document_title", type="string", length=255, nullable=false)
     */
    private $documentTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="document_file_location", type="string", length=2000, nullable=true)
     */
    private $documentFileLocation;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_timestamp", type="datetime", nullable=true)
     */
    private $createTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_timestamp", type="datetime", nullable=true)
     */
    private $updateTimestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="project_document_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectDocumentId;

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
     * @var \Acme\HelloBundle\Entity\GrantPhaseRequiredDocument
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\GrantPhaseRequiredDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_document_ID", referencedColumnName="grant_document_ID")
     * })
     */
    private $grantDocument;

    /**
     * @var \Acme\HelloBundle\Entity\Proponent
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Proponent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="updated_by_author", referencedColumnName="account_ID")
     * })
     */
    private $updatedByAuthor;

    /**
     * @var \Acme\HelloBundle\Entity\Proponent
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Proponent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by_author", referencedColumnName="account_ID")
     * })
     */
    private $createdByAuthor;



    /**
     * Set documentTitle
     *
     * @param string $documentTitle
     * @return ProjectDocument
     */
    public function setDocumentTitle($documentTitle)
    {
        $this->documentTitle = $documentTitle;

        return $this;
    }

    /**
     * Get documentTitle
     *
     * @return string 
     */
    public function getDocumentTitle()
    {
        return $this->documentTitle;
    }

    /**
     * Set documentFileLocation
     *
     * @param string $documentFileLocation
     * @return ProjectDocument
     */
    public function setDocumentFileLocation($documentFileLocation)
    {
        $this->documentFileLocation = $documentFileLocation;

        return $this;
    }

    /**
     * Get documentFileLocation
     *
     * @return string 
     */
    public function getDocumentFileLocation()
    {
        return $this->documentFileLocation;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return ProjectDocument
     */
    public function setCreateTimestamp($createTimestamp)
    {
        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * Get createTimestamp
     *
     * @return \DateTime 
     */
    public function getCreateTimestamp()
    {
        return $this->createTimestamp;
    }

    /**
     * Set updateTimestamp
     *
     * @param \DateTime $updateTimestamp
     * @return ProjectDocument
     */
    public function setUpdateTimestamp($updateTimestamp)
    {
        $this->updateTimestamp = $updateTimestamp;

        return $this;
    }

    /**
     * Get updateTimestamp
     *
     * @return \DateTime 
     */
    public function getUpdateTimestamp()
    {
        return $this->updateTimestamp;
    }

    /**
     * Get projectDocumentId
     *
     * @return integer 
     */
    public function getProjectDocumentId()
    {
        return $this->projectDocumentId;
    }

    /**
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return ProjectDocument
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
     * Set grantDocument
     *
     * @param \Acme\HelloBundle\Entity\GrantPhaseRequiredDocument $grantDocument
     * @return ProjectDocument
     */
    public function setGrantDocument(\Acme\HelloBundle\Entity\GrantPhaseRequiredDocument $grantDocument = null)
    {
        $this->grantDocument = $grantDocument;

        return $this;
    }

    /**
     * Get grantDocument
     *
     * @return \Acme\HelloBundle\Entity\GrantPhaseRequiredDocument 
     */
    public function getGrantDocument()
    {
        return $this->grantDocument;
    }

    /**
     * Set updatedByAuthor
     *
     * @param \Acme\HelloBundle\Entity\Proponent $updatedByAuthor
     * @return ProjectDocument
     */
    public function setUpdatedByAuthor(\Acme\HelloBundle\Entity\Proponent $updatedByAuthor = null)
    {
        $this->updatedByAuthor = $updatedByAuthor;

        return $this;
    }

    /**
     * Get updatedByAuthor
     *
     * @return \Acme\HelloBundle\Entity\Proponent 
     */
    public function getUpdatedByAuthor()
    {
        return $this->updatedByAuthor;
    }

    /**
     * Set createdByAuthor
     *
     * @param \Acme\HelloBundle\Entity\Proponent $createdByAuthor
     * @return ProjectDocument
     */
    public function setCreatedByAuthor(\Acme\HelloBundle\Entity\Proponent $createdByAuthor = null)
    {
        $this->createdByAuthor = $createdByAuthor;

        return $this;
    }

    /**
     * Get createdByAuthor
     *
     * @return \Acme\HelloBundle\Entity\Proponent 
     */
    public function getCreatedByAuthor()
    {
        return $this->createdByAuthor;
    }
}
