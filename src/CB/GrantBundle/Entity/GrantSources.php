<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * GrantSources
 *
 * @ORM\Table(name="grant_sources", indexes={@ORM\Index(name="fk_Grant_Sources_Grant1_idx", columns={"grant_ID"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class GrantSources
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_source_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantSourceId;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_source_name", type="string", length=255, nullable=false)
     */
    private $grantSourceName;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_source_path", type="string", length=2000, nullable=true)
     */
    private $grantSourcePath;

    /**
     * @var \CB\GrantBundle\Entity\Grant
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\Grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grant;
    
    
    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    
    private $temp;



    /**
     * Get grantSourceId
     *
     * @return integer 
     */
    public function getGrantSourceId()
    {
        return $this->grantSourceId;
    }

    /**
     * Set grantSourceName
     *
     * @param string $grantSourceName
     * @return GrantSources
     */
    public function setGrantSourceName($grantSourceName)
    {
        $this->grantSourceName = $grantSourceName;

        return $this;
    }

    /**
     * Get grantSourceName
     *
     * @return string 
     */
    public function getGrantSourceName()
    {
        return $this->grantSourceName;
    }

    /**
     * Set grantSourcePath
     *
     * @param string $grantSourcePath
     * @return GrantSources
     */
    public function setGrantSourcePath($grantSourcePath)
    {
        $this->grantSourcePath = $grantSourcePath;

        return $this;
    }

    /**
     * Get grantSourcePath
     *
     * @return string 
     */
    public function getGrantSourcePath()
    {
        return $this->grantSourcePath;
    }

    /**
     * Set grant
     *
     * @param \CB\GrantBundle\Entity\Grant $grant
     * @return GrantSources
     */
    public function setGrant(\CB\GrantBundle\Entity\Grant $grant = null)
    {
        $this->grant = $grant;

        return $this;
    }

    /**
     * Get grant
     *
     * @return \CB\GrantBundle\Entity\Grant 
     */
    public function getGrant()
    {
        return $this->grant;
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
        return 'uploads/documents/grant';
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
        if (isset($this->grantSourcePath)) {
            // store the old name to delete after the update
            $this->temp = $this->grantSourcePath;
            $this->grantSourcePath = null;
        } else {
            $this->grantSourcePath = 'initial';
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
            $this->grantSourcePath = $filename.'.'.$this->getFile()->guessExtension();
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
        $this->getFile()->move($this->getUploadRootDir(), $this->grantSourcePath);

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
