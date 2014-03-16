<?php

namespace CB\ProjectBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Report
 *
 * @ORM\Table(name="report")
 * @ORM\Entity
 */
class Report
{
    /**
     * @var string
     *
     * @ORM\Column(name="report_type", type="string", length=45, nullable=true)
     */
    private $reportType;

    /**
     * @var string
     *
     * @ORM\Column(name="report_description", type="string", length=10000, nullable=true)
     */
    private $reportDescription;

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
     * Set reportType
     *
     * @param string $reportType
     * @return Report
     */
    public function setReportType($reportType)
    {
        $this->reportType = $reportType;

        return $this;
    }

    /**
     * Get reportType
     *
     * @return string 
     */
    public function getReportType()
    {
        return $this->reportType;
    }

    /**
     * Set reportDescription
     *
     * @param string $reportDescription
     * @return Report
     */
    public function setReportDescription($reportDescription)
    {
        $this->reportDescription = $reportDescription;

        return $this;
    }

    /**
     * Get reportDescription
     *
     * @return string 
     */
    public function getReportDescription()
    {
        return $this->reportDescription;
    }

    /**
     * Set projectDocument
     *
     * @param \CB\ProjectBundle\Entity\ProjectDocument $projectDocument
     * @return Report
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
