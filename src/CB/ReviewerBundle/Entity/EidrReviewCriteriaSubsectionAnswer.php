<?php

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EidrReviewCriteriaSubsectionAnswer
 *
 * @ORM\Table(name="eidr_review_criteria_subsection_answer", indexes={@ORM\Index(name="fk_EIDR_Review_Criteria_Subsection_Answer_EIDR_Review_Crite_idx", columns={"criteria_subsection_number"})})
 * @ORM\Entity
 */
class EidrReviewCriteriaSubsectionAnswer
{
    /**
     * @var string
     *
     * @ORM\Column(name="criteria_subsection_answer", type="string", length=10000, nullable=false)
     */
    private $criteriaSubsectionAnswer;

    /**
     * @var \CB\ReviewerBundle\Entity\Review
     *
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="CB\ReviewerBundle\Entity\Review")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID", unique=true)
     * })
     */
    private $review;

    /**
     * @var \CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsection
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsection")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="criteria_subsection_number", referencedColumnName="criteria_subsection_number")
     * })
     */
    private $criteriaSubsectionNumber;



    /**
     * Set criteriaSubsectionAnswer
     *
     * @param string $criteriaSubsectionAnswer
     * @return EidrReviewCriteriaSubsectionAnswer
     */
    public function setCriteriaSubsectionAnswer($criteriaSubsectionAnswer)
    {
        $this->criteriaSubsectionAnswer = $criteriaSubsectionAnswer;

        return $this;
    }

    /**
     * Get criteriaSubsectionAnswer
     *
     * @return string 
     */
    public function getCriteriaSubsectionAnswer()
    {
        return $this->criteriaSubsectionAnswer;
    }

    /**
     * Set review
     *
     * @param \CB\ReviewerBundle\Entity\Review $review
     * @return EidrReviewCriteriaSubsectionAnswer
     */
    public function setReview(\CB\ReviewerBundle\Entity\Review $review = null)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return \CB\ReviewerBundle\Entity\Review 
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set criteriaSubsectionNumber
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsection $criteriaSubsectionNumber
     * @return EidrReviewCriteriaSubsectionAnswer
     */
    public function setCriteriaSubsectionNumber(\CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsection $criteriaSubsectionNumber = null)
    {
        $this->criteriaSubsectionNumber = $criteriaSubsectionNumber;

        return $this;
    }

    /**
     * Get criteriaSubsectionNumber
     *
     * @return \CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsection 
     */
    public function getCriteriaSubsectionNumber()
    {
        return $this->criteriaSubsectionNumber;
    }
}
