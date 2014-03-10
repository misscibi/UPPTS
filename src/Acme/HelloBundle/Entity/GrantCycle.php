<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantCycle
 *
 * @ORM\Table(name="grant_cycle", indexes={@ORM\Index(name="fk_Grant_Cycle_Grant1_idx", columns={"grant_ID"})})
 * @ORM\Entity
 */
class GrantCycle
{
    /**
     * @var string
     *
     * @ORM\Column(name="grant_cycle_title", type="string", length=255, nullable=false)
     */
    private $grantCycleTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="grant_cycle_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantCycleId;

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
     * Set grantCycleTitle
     *
     * @param string $grantCycleTitle
     * @return GrantCycle
     */
    public function setGrantCycleTitle($grantCycleTitle)
    {
        $this->grantCycleTitle = $grantCycleTitle;

        return $this;
    }

    /**
     * Get grantCycleTitle
     *
     * @return string 
     */
    public function getGrantCycleTitle()
    {
        return $this->grantCycleTitle;
    }

    /**
     * Get grantCycleId
     *
     * @return integer 
     */
    public function getGrantCycleId()
    {
        return $this->grantCycleId;
    }

    /**
     * Set grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     * @return GrantCycle
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
