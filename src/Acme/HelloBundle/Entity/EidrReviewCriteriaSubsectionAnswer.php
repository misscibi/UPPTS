<?php

namespace Acme\HelloBundle\Entity;

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
     * @var \Acme\HelloBundle\Entity\Review
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\Review")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID")
     * })
     */
    private $review;

    /**
     * @var \Acme\HelloBundle\Entity\EidrReviewCriteriaSubsection
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\EidrReviewCriteriaSubsection")
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
     * @param \Acme\HelloBundle\Entity\Review $review
     * @return EidrReviewCriteriaSubsectionAnswer
     */
    public function setReview(\Acme\HelloBundle\Entity\Review $review)
    {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return \Acme\HelloBundle\Entity\Review 
     */
    public function getReview()
    {
        return $this->review;
    }

    /**
     * Set criteriaSubsectionNumber
     *
     * @param \Acme\HelloBundle\Entity\EidrReviewCriteriaSubsection $criteriaSubsectionNumber
     * @return EidrReviewCriteriaSubsectionAnswer
     */
    public function setCriteriaSubsectionNumber(\Acme\HelloBundle\Entity\EidrReviewCriteriaSubsection $criteriaSubsectionNumber = null)
    {
        $this->criteriaSubsectionNumber = $criteriaSubsectionNumber;

        return $this;
    }

    /**
     * Get criteriaSubsectionNumber
     *
     * @return \Acme\HelloBundle\Entity\EidrReviewCriteriaSubsection 
     */
    public function getCriteriaSubsectionNumber()
    {
        return $this->criteriaSubsectionNumber;
    }
}
