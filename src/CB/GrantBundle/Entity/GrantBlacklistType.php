<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * GrantBlacklistType
 *
 * @ORM\Table(name="grant_blacklist_type", uniqueConstraints={@ORM\UniqueConstraint(name="unique_grant_blacklist", columns={"grant_ID","grant_type"})})
 * @ORM\Entity
 * @UniqueEntity(fields={"grantID", "grantType"})
 * )
 */
class GrantBlacklistType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="grant_type", type="string", length=45)
     */
    private $grantType;
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_ID", type="integer")
     */
    private $grantID;

    /**
     * @var \CB\GrantBundle\Entity\Grant
     * 
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\Grant", inversedBy="grant")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     * })
     */
    private $grant;



    /**
     * Set grantType
     *
     * @param string $grantType
     * @return GrantBlacklistType
     */
    public function setGrantType($grantType)
    {
        $this->grantType = $grantType;

        return $this;
    }

    /**
     * Get grantType
     *
     * @return string 
     */
    public function getGrantType()
    {
        return $this->grantType;
    }

    /**
     * Set grant
     *
     * @param \CB\GrantBundle\Entity\Grant $grant
     * @return GrantBlacklistType
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set grantID
     *
     * @param integer $grantID
     * @return GrantBlacklistType
     */
    public function setGrantID($grantID)
    {
        $this->grantID = $grantID;

        return $this;
    }

    /**
     * Get grantID
     *
     * @return integer 
     */
    public function getGrantID()
    {
        return $this->grantID;
    }
}
