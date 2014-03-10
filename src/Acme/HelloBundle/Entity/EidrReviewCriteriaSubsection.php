<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EidrReviewCriteriaSubsection
 *
 * @ORM\Table(name="eidr_review_criteria_subsection", indexes={@ORM\Index(name="fk_EIDR_Review_Criteria_Subsection_EIDR_Review_Criteria1_idx", columns={"criteria_number"})})
 * @ORM\Entity
 */
class EidrReviewCriteriaSubsection
{
    /**
     * @var string
     *
     * @ORM\Column(name="criteria_question", type="string", length=10000, nullable=false)
     */
    private $criteriaQuestion;

    /**
     * @var integer
     *
     * @ORM\Column(name="criteria_subsection_number", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $criteriaSubsectionNumber;

    /**
     * @var \Acme\HelloBundle\Entity\EidrReviewCriteria
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\EidrReviewCriteria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criteria_number", referencedColumnName="criteria_number")
     * })
     */
    private $criteriaNumber;



    /**
     * Set criteriaQuestion
     *
     * @param string $criteriaQuestion
     * @return EidrReviewCriteriaSubsection
     */
    public function setCriteriaQuestion($criteriaQuestion)
    {
        $this->criteriaQuestion = $criteriaQuestion;

        return $this;
    }

    /**
     * Get criteriaQuestion
     *
     * @return string 
     */
    public function getCriteriaQuestion()
    {
        return $this->criteriaQuestion;
    }

    /**
     * Get criteriaSubsectionNumber
     *
     * @return integer 
     */
    public function getCriteriaSubsectionNumber()
    {
        return $this->criteriaSubsectionNumber;
    }

    /**
     * Set criteriaNumber
     *
     * @param \Acme\HelloBundle\Entity\EidrReviewCriteria $criteriaNumber
     * @return EidrReviewCriteriaSubsection
     */
    public function setCriteriaNumber(\Acme\HelloBundle\Entity\EidrReviewCriteria $criteriaNumber = null)
    {
        $this->criteriaNumber = $criteriaNumber;

        return $this;
    }

    /**
     * Get criteriaNumber
     *
     * @return \Acme\HelloBundle\Entity\EidrReviewCriteria 
     */
    public function getCriteriaNumber()
    {
        return $this->criteriaNumber;
    }
}
