<?php

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EidrReviewCriteria
 *
 * @ORM\Table(name="eidr_review_criteria")
 * @ORM\Entity
 */
class EidrReviewCriteria
{
    /**
     * @var integer
     *
     * @ORM\Column(name="criteria_number", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $criteriaNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="criteria_title", type="string", length=255, nullable=true)
     */
    private $criteriaTitle;

    /**
     * Get criteriaNumber
     *
     * @return integer 
     */
    public function getCriteriaNumber()
    {
        return $this->criteriaNumber;
    }

    /**
     * Set criteriaTitle
     *
     * @param string $criteriaTitle
     * @return EidrReviewCriteria
     */
    public function setCriteriaTitle($criteriaTitle)
    {
        $this->criteriaTitle = $criteriaTitle;

        return $this;
    }

    /**
     * Get criteriaTitle
     *
     * @return string 
     */
    public function getCriteriaTitle()
    {
        return $this->criteriaTitle;
    }

    /**
     * Add review
     *
     * @param \CB\ReviewerBundle\Entity\Review $review
     * @return EidrReviewCriteria
     */
    public function addReview(\CB\ReviewerBundle\Entity\Review $review)
    {
        $this->review[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \CB\ReviewerBundle\Entity\Review $review
     */
    public function removeReview(\CB\ReviewerBundle\Entity\Review $review)
    {
        $this->review->removeElement($review);
    }

    /**
     * Get review
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReview()
    {
        return $this->review;
    }
}
