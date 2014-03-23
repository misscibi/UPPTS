<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ProjectDocument
 *
 * @ORM\Table(name="project_document", indexes={@ORM\Index(name="fk_Project_Document_Proponent1_idx", columns={"created_by_author"}), @ORM\Index(name="fk_Project_Document_Proponent2_idx", columns={"updated_by_author"}), @ORM\Index(name="fk_Project_Document_Grant_Phase_Required_Document1_idx", columns={"grant_document_ID"}), @ORM\Index(name="fk_Project_Document_Project1_idx", columns={"project_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class ProjectDocument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="project_document_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $projectDocumentId;

    /**
     * @var string
     *
     * @ORM\Column(name="document_title", type="string", length=255, nullable=false)
     */
    private $documentTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="document_path", type="string", length=2000, nullable=true)
     */
    private $documentPath;

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
     * @var \CB\ProjectBundle\Entity\Proponent
     *
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Proponent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by_author", referencedColumnName="account_ID")
     * })
     */
    private $createdByAuthor;

    /**
     * @var \CB\ProjectBundle\Entity\Proponent
     *
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Proponent")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="updated_by_author", referencedColumnName="account_ID")
     * })
     */
    private $updatedByAuthor;

    /**
     * @var \CB\GrantBundle\Entity\GrantPhaseRequiredDocument
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\GrantPhaseRequiredDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_document_ID", referencedColumnName="grant_document_ID")
     * })
     */
    private $grantDocument;

    /**
     * @var \CB\ProjectBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    
    private $temp;

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
     * Set documentPath
     *
     * @param string $documentPath
     * @return ProjectDocument
     */
    public function setDocumentPath($documentPath)
    {
        $this->documentPath = $documentPath;

        return $this;
    }

    /**
     * Get documentPath
     *
     * @return string 
     */
    public function getDocumentPath()
    {
        return $this->documentPath;
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
     * Set createdByAuthor
     *
     * @param \CB\ProjectBundle\Entity\Proponent $createdByAuthor
     * @return ProjectDocument
     */
    public function setCreatedByAuthor(\CB\ProjectBundle\Entity\Proponent $createdByAuthor = null)
    {
        $this->createdByAuthor = $createdByAuthor;

        return $this;
    }

    /**
     * Get createdByAuthor
     *
     * @return \CB\ProjectBundle\Entity\Proponent 
     */
    public function getCreatedByAuthor()
    {
        return $this->createdByAuthor;
    }

    /**
     * Set updatedByAuthor
     *
     * @param \CB\ProjectBundle\Entity\Proponent $updatedByAuthor
     * @return ProjectDocument
     */
    public function setUpdatedByAuthor(\CB\ProjectBundle\Entity\Proponent $updatedByAuthor = null)
    {
        $this->updatedByAuthor = $updatedByAuthor;

        return $this;
    }

    /**
     * Get updatedByAuthor
     *
     * @return \CB\ProjectBundle\Entity\Proponent 
     */
    public function getUpdatedByAuthor()
    {
        return $this->updatedByAuthor;
    }

    /**
     * Set grantDocument
     *
     * @param \CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantDocument
     * @return ProjectDocument
     */
    public function setGrantDocument(\CB\GrantBundle\Entity\GrantPhaseRequiredDocument $grantDocument = null)
    {
        $this->grantDocument = $grantDocument;

        return $this;
    }

    /**
     * Get grantDocument
     *
     * @return \CB\GrantBundle\Entity\GrantPhaseRequiredDocument 
     */
    public function getGrantDocument()
    {
        return $this->grantDocument;
    }

    /**
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return ProjectDocument
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
    
    public function getAbsolutePath()
    {
        return null === $this->grantSourcePath
            ? null
            : $this->getUploadRootDir().'/'.$this->grantSourcePath;
    }

    public function getWebPath()
    {
        return null === $this->grantSourcePath
            ? null
            : $this->getUploadDir().'/'.$this->grantSourcePath;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents/project';
    }
    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->documentPath)) {
            // store the old name to delete after the update
            $this->temp = $this->documentPath;
            $this->documentPath = null;
        } else {
            $this->documentPath = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->documentPath = $filename.'.'.$this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->documentPath);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
}
