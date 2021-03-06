<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantBlacklistType
 *
 * @ORM\Table(name="grant_blacklist_type", indexes={@ORM\Index(name="IDX_A3D4F84AF2E68D99", columns={"grant_ID"})})
 * @ORM\Entity
 */
class GrantBlacklistType
{
    /**
     * @var string
     *
     * @ORM\Column(name="grant_type", type="string", length=45)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $grantType;

    /**
     * @var \Acme\HelloBundle\Entity\Grant
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\Grant")
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
     * @param \Acme\HelloBundle\Entity\Grant $grant
     * @return GrantBlacklistType
     */
    public function setGrant(\Acme\HelloBundle\Entity\Grant $grant)
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
