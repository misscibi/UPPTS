<?php

namespace CB\ProjectBundle\Entity;

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
     * @var \CB\ProjectBundle\Entity\ProjectDocument
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="CB\ProjectBundle\Entity\ProjectDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_document_ID", referencedColumnName="project_document_ID", unique=true)
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
     * @param \CB\ProjectBundle\Entity\ProjectDocument $projectDocument
     * @return EidrCapsuleConceptCover
     */
    public function setProjectDocument(\CB\ProjectBundle\Entity\ProjectDocument $projectDocument = null)
    {
        $this->projectDocument = $projectDocument;

        return $this;
    }

    /**
     * Get projectDocument
     *
     * @return \CB\ProjectBundle\Entity\ProjectDocument 
     */
    public function getProjectDocument()
    {
        return $this->projectDocument;
    }
}
