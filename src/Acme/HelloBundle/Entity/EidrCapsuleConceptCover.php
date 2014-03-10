<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EidrCapsuleConceptCover
 *
 * @ORM\Table(name="eidr_capsule_concept_cover")
 * @ORM\Entity
 */
class EidrCapsuleConceptCover
{
    /**
     * @var string
     *
     * @ORM\Column(name="type_of_application", type="string", length=45, nullable=true)
     */
    private $typeOfApplication;

    /**
     * @var integer
     *
     * @ORM\Column(name="proposed_years_of_program", type="integer", nullable=true)
     */
    private $proposedYearsOfProgram;

    /**
     * @var string
     *
     * @ORM\Column(name="site_location_implementing", type="string", length=255, nullable=true)
     */
    private $siteLocationImplementing;

    /**
     * @var string
     *
     * @ORM\Column(name="site_location_cooperating", type="string", length=255, nullable=true)
     */
    private $siteLocationCooperating;

    /**
     * @var \Acme\HelloBundle\Entity\ProjectDocument
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\ProjectDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_document_ID", referencedColumnName="project_document_ID")
     * })
     */
    private $projectDocument;



    /**
     * Set typeOfApplication
     *
     * @param string $typeOfApplication
     * @return EidrCapsuleConceptCover
     */
    public function setTypeOfApplication($typeOfApplication)
    {
        $this->typeOfApplication = $typeOfApplication;

        return $this;
    }

    /**
     * Get typeOfApplication
     *
     * @return string 
     */
    public function getTypeOfApplication()
    {
        return $this->typeOfApplication;
    }

    /**
     * Set proposedYearsOfProgram
     *
     * @param integer $proposedYearsOfProgram
     * @return EidrCapsuleConceptCover
     */
    public function setProposedYearsOfProgram($proposedYearsOfProgram)
    {
        $this->proposedYearsOfProgram = $proposedYearsOfProgram;

        return $this;
    }

    /**
     * Get proposedYearsOfProgram
     *
     * @return integer 
     */
    public function getProposedYearsOfProgram()
    {
        return $this->proposedYearsOfProgram;
    }

    /**
     * Set siteLocationImplementing
     *
     * @param string $siteLocationImplementing
     * @return EidrCapsuleConceptCover
     */
    public function setSiteLocationImplementing($siteLocationImplementing)
    {
        $this->siteLocationImplementing = $siteLocationImplementing;

        return $this;
    }

    /**
     * Get siteLocationImplementing
     *
     * @return string 
     */
    public function getSiteLocationImplementing()
    {
        return $this->siteLocationImplementing;
    }

    /**
     * Set siteLocationCooperating
     *
     * @param string $siteLocationCooperating
     * @return EidrCapsuleConceptCover
     */
    public function setSiteLocationCooperating($siteLocationCooperating)
    {
        $this->siteLocationCooperating = $siteLocationCooperating;

        return $this;
    }

    /**
     * Get siteLocationCooperating
     *
     * @return string 
     */
    public function getSiteLocationCooperating()
    {
        return $this->siteLocationCooperating;
    }

    /**
     * Set projectDocument
     *
     * @param \Acme\HelloBundle\Entity\ProjectDocument $projectDocument
     * @return EidrCapsuleConceptCover
     */
    public function setProjectDocument(\Acme\HelloBundle\Entity\ProjectDocument $projectDocument)
    {
        $this->projectDocument = $projectDocument;

        return $this;
    }

    /**
     * Get projectDocument
     *
     * @return \Acme\HelloBundle\Entity\ProjectDocument 
     */
    public function getProjectDocument()
    {
        return $this->projectDocument;
    }
}
