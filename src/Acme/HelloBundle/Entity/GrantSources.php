<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantSources
 *
 * @ORM\Table(name="grant_sources", indexes={@ORM\Index(name="fk_Grant_Sources_Grant1_idx", columns={"grant_ID"})})
 * @ORM\Entity
 */
class GrantSources
{
    /**
     * @var string
     *
     * @ORM\Column(name="grant_source_name", type="string", length=255, nullable=false)
     */
    private $grantSourceName;

    /**
     * @var string
     *
     * @ORM\Column(name="grant_source_file_location", type="string", length=2000, nullable=false)
     */
    private $grantSourceFileLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="grant_source_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantSourceId;

    /**
     * @var \Acme\HelloBundle\Entity\Grant
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grant;



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
     * Set grantSourceFileLocation
     *
     * @param string $grantSourceFileLocation
     * @return GrantSources
     */
    public function setGrantSourceFileLocation($grantSourceFileLocation)
    {
        $this->grantSourceFileLocation = $grantSourceFileLocation;

        return $this;
    }

    /**
     * Get grantSourceFileLocation
     *
     * @return string 
     */
    public function getGrantSourceFileLocation()
    {
        return $this->grantSourceFileLocation;
    }

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
     * Set grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     * @return GrantSources
     */
    public function setGrant(\Acme\HelloBundle\Entity\Grant $grant = null)
    {
        $this->grant = $grant;

        return $this;
    }

    /**
     * Get grant
     *
     * @return \Acme\HelloBundle\Entity\Grant 
     */
    public function getGrant()
    {
        return $this->grant;
    }
}
