<?php

namespace Acme\HelloBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="grant_document_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $grantDocumentId;

    /**
     * @var \Acme\HelloBundle\Entity\Phase
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Phase")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_ID", referencedColumnName="phase_ID")
     * })
     */
    private $phase;



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
     * Get grantDocumentId
     *
     * @return integer 
     */
    public function getGrantDocumentId()
    {
        return $this->grantDocumentId;
    }

    /**
     * Set phase
     *
     * @param \Acme\HelloBundle\Entity\Phase $phase
     * @return GrantPhaseRequiredDocument
     */
    public function setPhase(\Acme\HelloBundle\Entity\Phase $phase = null)
    {
        $this->phase = $phase;

        return $this;
    }

    /**
     * Get phase
     *
     * @return \Acme\HelloBundle\Entity\Phase 
     */
    public function getPhase()
    {
        return $this->phase;
    }
}
