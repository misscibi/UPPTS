<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Phase
 *
 * @ORM\Table(name="phase", indexes={@ORM\Index(name="fk_Phase_Grant_Cycle1_idx", columns={"grant_cycle_ID"})})
 * @ORM\Entity
 */
class Phase
{
    /**
     * @var integer
     *
     * @ORM\Column(name="phase_order", type="integer", nullable=true)
     */
    private $phaseOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="phase_title", type="string", length=255, nullable=true)
     */
    private $phaseTitle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_open_to_all", type="boolean", nullable=true)
     */
    private $isOpenToAll;

    /**
     * @var integer
     *
     * @ORM\Column(name="phase_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $phaseId;

    /**
     * @var \Acme\HelloBundle\Entity\GrantCycle
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\GrantCycle")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_ID", referencedColumnName="grant_cycle_ID")
     * })
     */
    private $grantCycle;



    /**
     * Set phaseOrder
     *
     * @param integer $phaseOrder
     * @return Phase
     */
    public function setPhaseOrder($phaseOrder)
    {
        $this->phaseOrder = $phaseOrder;

        return $this;
    }

    /**
     * Get phaseOrder
     *
     * @return integer 
     */
    public function getPhaseOrder()
    {
        return $this->phaseOrder;
    }

    /**
     * Set phaseTitle
     *
     * @param string $phaseTitle
     * @return Phase
     */
    public function setPhaseTitle($phaseTitle)
    {
        $this->phaseTitle = $phaseTitle;

        return $this;
    }

    /**
     * Get phaseTitle
     *
     * @return string 
     */
    public function getPhaseTitle()
    {
        return $this->phaseTitle;
    }

    /**
     * Set isOpenToAll
     *
     * @param boolean $isOpenToAll
     * @return Phase
     */
    public function setIsOpenToAll($isOpenToAll)
    {
        $this->isOpenToAll = $isOpenToAll;

        return $this;
    }

    /**
     * Get isOpenToAll
     *
     * @return boolean 
     */
    public function getIsOpenToAll()
    {
        return $this->isOpenToAll;
    }

    /**
     * Get phaseId
     *
     * @return integer 
     */
    public function getPhaseId()
    {
        return $this->phaseId;
    }

    /**
     * Set grantCycle
     *
     * @param \Acme\HelloBundle\Entity\GrantCycle $grantCycle
     * @return Phase
     */
    public function setGrantCycle(\Acme\HelloBundle\Entity\GrantCycle $grantCycle = null)
    {
        $this->grantCycle = $grantCycle;

        return $this;
    }

    /**
     * Get grantCycle
     *
     * @return \Acme\HelloBundle\Entity\GrantCycle 
     */
    public function getGrantCycle()
    {
        return $this->grantCycle;
    }
}
