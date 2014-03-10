<?php

namespace Acme\HelloBundle\Entity;

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
     * @var string
     *
     * @ORM\Column(name="criteria_title", type="string", length=255, nullable=true)
     */
    private $criteriaTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="criteria_number", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $criteriaNumber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Review", inversedBy="criteriaNumber")
     * @ORM\JoinTable(name="eidr_review_criteria_score",
     *   joinColumns={
     *     @ORM\JoinColumn(name="criteria_number", referencedColumnName="criteria_number")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID")
     *   }
     * )
     */
    private $review;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->review = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get criteriaNumber
     *
     * @return integer 
     */
    public function getCriteriaNumber()
    {
        return $this->criteriaNumber;
    }

    /**
     * Add review
     *
     * @param \Acme\HelloBundle\Entity\Review $review
     * @return EidrReviewCriteria
     */
    public function addReview(\Acme\HelloBundle\Entity\Review $review)
    {
        $this->review[] = $review;

        return $this;
    }

    /**
     * Remove review
     *
     * @param \Acme\HelloBundle\Entity\Review $review
     */
    public function removeReview(\Acme\HelloBundle\Entity\Review $review)
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
