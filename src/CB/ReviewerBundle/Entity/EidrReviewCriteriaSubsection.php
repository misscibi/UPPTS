<?php

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EidrReviewCriteriaSubsection
 *
 * @ORM\Table(name="eidr_review_criteria_subsection", uniqueConstraints={@ORM\UniqueConstraint(name="criteria_subsection_UNIQUE", columns={"criteria_subsection_number", "criteria_number"})}, indexes={@ORM\Index(name="fk_EIDR_Review_Criteria_Subsection_EIDR_Review_Criteria1_idx", columns={"criteria_number"})})
 * @ORM\Entity
 */
class EidrReviewCriteriaSubsection
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="criteria_subsection_number", type="integer")
     */
    private $criteriaSubsectionNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="criteria_question", type="string", length=10000, nullable=false)
     */
    private $criteriaQuestion;

    /**
     * @var \CB\ReviewerBundle\Entity\EidrReviewCriteria
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\ReviewerBundle\Entity\EidrReviewCriteria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criteria_number", referencedColumnName="criteria_number")
     * })
     */
    private $criteriaNumber;



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
     * Set criteriaNumber
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber
     * @return EidrReviewCriteriaSubsection
     */
    public function setCriteriaNumber(\CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber = null)
    {
        $this->criteriaNumber = $criteriaNumber;

        return $this;
    }

    /**
     * Get criteriaNumber
     *
     * @return \CB\ReviewerBundle\Entity\EidrReviewCriteria 
     */
    public function getCriteriaNumber()
    {
        return $this->criteriaNumber;
    }

    /**
     * Set criteriaSubsectionNumber
     *
     * @param integer $criteriaSubsectionNumber
     * @return EidrReviewCriteriaSubsection
     */
    public function setCriteriaSubsectionNumber($criteriaSubsectionNumber)
    {
        $this->criteriaSubsectionNumber = $criteriaSubsectionNumber;

        return $this;
    }
}
