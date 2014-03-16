<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EidrReviewCriteriaScore
 *
 * @author Christabel
 */

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EIDRReviewCriteriaScore
 * 
 * @ORM\Table(name="eidr_review_criteria_score")
 * @ORM\Entity
 */


class EidrReviewCriteriaScore {
    /**
     * @var integer
     * 
     * @ORM\Column(name="criteria_rating", type="integer")
     */
    private $criteriaRating;
    
    /**
     * @var string
     * 
     * @ORM\Column(name="criteria_comments", type="string", length=1000, nullable=true)
     */
    private $criteriaComments;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\ReviewerBundle\Entity\Review")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID")
     * })
     */
    private $review;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="CB\ReviewerBundle\Entity\EidrReviewCriteria")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="criteria_number", referencedColumnName="criteria_number")
     * })
     */
    private $eidrReviewCriteria;
    
    public function __construct() {
        $this->review = new ArrayCollection();
        $this->eidrReviewCriteria = new ArrayCollection();
    }

    /**
     * Set criteriaRating
     *
     * @param integer $criteriaRating
     * @return EidrReviewCriteriaScore
     */
    public function setCriteriaRating($criteriaRating)
    {
        $this->criteriaRating = $criteriaRating;

        return $this;
    }

    /**
     * Get criteriaRating
     *
     * @return integer 
     */
    public function getCriteriaRating()
    {
        return $this->criteriaRating;
    }

    /**
     * Set criteriaComments
     *
     * @param string $criteriaComments
     * @return EidrReviewCriteriaScore
     */
    public function setCriteriaComments($criteriaComments)
    {
        $this->criteriaComments = $criteriaComments;

        return $this;
    }

    /**
     * Get criteriaComments
     *
     * @return string 
     */
    public function getCriteriaComments()
    {
        return $this->criteriaComments;
    }

    /**
     * Set review
     *
     * @param \CB\ReviewerBundle\Entity\Review $review
     * @return EidrReviewCriteriaScore
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
     * Set eidrReviewCriteria
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteria $eidrReviewCriteria
     * @return EidrReviewCriteriaScore
     */
    public function setEidrReviewCriteria(\CB\ReviewerBundle\Entity\EidrReviewCriteria $eidrReviewCriteria = null)
    {
        $this->eidrReviewCriteria = $eidrReviewCriteria;

        return $this;
    }

    /**
     * Get eidrReviewCriteria
     *
     * @return \CB\ReviewerBundle\Entity\EidrReviewCriteria 
     */
    public function getEidrReviewCriteria()
    {
        return $this->eidrReviewCriteria;
    }
}
