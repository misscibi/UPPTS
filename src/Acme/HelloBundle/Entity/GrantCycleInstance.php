<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantCycleInstance
 *
 * @ORM\Table(name="grant_cycle_instance", indexes={@ORM\Index(name="fk_Grant_Cycle_Instance_Grant_Cycle1_idx", columns={"grant_cycle_ID"})})
 * @ORM\Entity
 */
class GrantCycleInstance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_cycle_instance_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantCycleInstanceId;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Project", mappedBy="grantCycleInstance")
     */
    private $project;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get grantCycleInstanceId
     *
     * @return integer 
     */
    public function getGrantCycleInstanceId()
    {
        return $this->grantCycleInstanceId;
    }

    /**
     * Set grantCycle
     *
     * @param \Acme\HelloBundle\Entity\GrantCycle $grantCycle
     * @return GrantCycleInstance
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

    /**
     * Add project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return GrantCycleInstance
     */
    public function addProject(\Acme\HelloBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     */
    public function removeProject(\Acme\HelloBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProject()
    {
        return $this->project;
    }
}
