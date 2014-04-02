<?php

namespace CB\GrantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrantPhaseRequiredDocument
 *
 * @ORM\Table(name="grant_phase_required_document", indexes={@ORM\Index(name="fk_Grant_Phase_Required_Document_Phase1_idx", columns={"phase_ID"})})
 * @ORM\Entity
 */
class GrantPhaseRequiredDocument
{
    /**
     * @var integer
     *
     * @ORM\Column(name="grant_document_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantDocumentId;

    /**
     * @var string
     *
     * @ORM\Column(name="required_documents_name", type="string", length=255, nullable=false)
     */
    private $requiredDocumentsName;

    /**
     * @var string
     *
     * @ORM\Column(name="required_documents_description", type="string", length=10000, nullable=true)
     */
    private $requiredDocumentsDescription;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=100, nullable=true)
     */
    private $type;

    /**
     * @var \CB\GrantBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\Phase", inversedBy="grantPhaseRequiredDocument")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $phase;



    /**
     * Get grantDocumentId
     *
     * @return integer 
     */
    public function getGrantDocumentId()
    {
        return $this->grantDocumentId;
    }

    /**
     * Set requiredDocumentsName
     *
     * @param string $requiredDocumentsName
     * @return GrantPhaseRequiredDocument
     */
    public function setRequiredDocumentsName($requiredDocumentsName)
    {
        $this->requiredDocumentsName = $requiredDocumentsName;

        return $this;
    }

    /**
     * Get requiredDocumentsName
     *
     * @return string 
     */
    public function getRequiredDocumentsName()
    {
        return $this->requiredDocumentsName;
    }

    /**
     * Set requiredDocumentsDescription
     *
     * @param string $requiredDocumentsDescription
     * @return GrantPhaseRequiredDocument
     */
    public function setRequiredDocumentsDescription($requiredDocumentsDescription)
    {
        $this->requiredDocumentsDescription = $requiredDocumentsDescription;

        return $this;
    }

    /**
     * Get requiredDocumentsDescription
     *
     * @return string 
     */
    public function getRequiredDocumentsDescription()
    {
        return $this->requiredDocumentsDescription;
    }

    /**
     * Set phase
     *
     * @param \CB\GrantBundle\Entity\Phase $phase
     * @return GrantPhaseRequiredDocument
     */
    public function setPhase(\CB\GrantBundle\Entity\Phase $phase = null)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * Get phase
     *
     * @return \CB\GrantBundle\Entity\Phase 
     */
    public function getPhase()
    {
        return $this->phase;
    }
}
