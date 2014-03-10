<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PriorityResearchArea
 *
 * @ORM\Table(name="priority_research_area")
 * @ORM\Entity
 */
class PriorityResearchArea
{
    /**
     * @var string
     *
     * @ORM\Column(name="research_area_tag", type="string", length=255, nullable=false)
     */
    private $researchAreaTag;

    /**
     * @var \Acme\HelloBundle\Entity\GrantCycleInstance
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\GrantCycleInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grant_cycle_instance_ID", referencedColumnName="grant_cycle_instance_ID")
     * })
     */
    private $grantCycleInstance;



    /**
     * Set researchAreaTag
     *
     * @param string $researchAreaTag
     * @return PriorityResearchArea
     */
    public function setResearchAreaTag($researchAreaTag)
    {
        $this->researchAreaTag = $researchAreaTag;

        return $this;
    }

    /**
     * Get researchAreaTag
     *
     * @return string 
     */
    public function getResearchAreaTag()
    {
        return $this->researchAreaTag;
    }

    /**
     * Set grantCycleInstance
     *
     * @param \Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance
     * @return PriorityResearchArea
     */
    public function setGrantCycleInstance(\Acme\HelloBundle\Entity\GrantCycleInstance $grantCycleInstance)
    {
        $this->grantCycleInstance = $grantCycleInstance;

        return $this;
    }

    /**
     * Get grantCycleInstance
     *
     * @return \Acme\HelloBundle\Entity\GrantCycleInstance 
     */
    public function getGrantCycleInstance()
    {
        return $this->grantCycleInstance;
    }
}
