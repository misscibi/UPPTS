<?php

namespace CB\ReviewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Review
 *
 * @ORM\Table(name="review", indexes={@ORM\Index(name="fk_Review_Reviewer1_idx", columns={"reviewer_ID"}), @ORM\Index(name="fk_Review_Phase_Instance1_idx", columns={"phase_instance_ID"})})
 * @ORM\Entity
 */
class Review
{
    /**
     * @var integer
     *
     * @ORM\Column(name="review_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $reviewId;

    /**
     * @var string
     *
     * @ORM\Column(name="review_title", type="string", length=255, nullable=true)
     */
    private $reviewTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="review_description", type="string", length=10000, nullable=false)
     */
    private $reviewDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="review_rating", type="integer", nullable=true)
     */
    private $reviewRating;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_timestamp", type="datetime", nullable=true)
     */
    private $createTimestamp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="update_timestamp", type="datetime", nullable=true)
     */
    private $updateTimestamp;

    /**
     * @var \CB\ReviewerBundle\Entity\Reviewer
     *
     * @ORM\ManyToOne(targetEntity="CB\ReviewerBundle\Entity\Reviewer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reviewer_ID", referencedColumnName="reviewer_ID")
     * })
     */
    private $reviewer;

    /**
     * @var \CB\GrantBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="CB\GrantBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $phaseInstance;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ReviewerBundle\Entity\EidrReviewCriteriaScore", mappedBy="review")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID")
     * })
     */
    private $eidrReviewCriteriaScore;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsectionAnswer", mappedBy="review")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="review_ID", referencedColumnName="review_ID")
     * })
     */
    private $eidrReviewCriteriaSubsectionAnswer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->eidrReviewCriteriaScore = new \Doctrine\Common\Collections\ArrayCollection();
        $this->eidrReviewCriteriaSubsectionAnswer = new ArrayCollection();
    }


    /**
     * Get reviewId
     *
     * @return integer 
     */
    public function getReviewId()
    {
        return $this->reviewId;
    }

    /**
     * Set reviewTitle
     *
     * @param string $reviewTitle
     * @return Review
     */
    public function setReviewTitle($reviewTitle)
    {
        $this->reviewTitle = $reviewTitle;

        return $this;
    }

    /**
     * Get reviewTitle
     *
     * @return string 
     */
    public function getReviewTitle()
    {
        return $this->reviewTitle;
    }

    /**
     * Set reviewDescription
     *
     * @param string $reviewDescription
     * @return Review
     */
    public function setReviewDescription($reviewDescription)
    {
        $this->reviewDescription = $reviewDescription;

        return $this;
    }

    /**
     * Get reviewDescription
     *
     * @return string 
     */
    public function getReviewDescription()
    {
        return $this->reviewDescription;
    }

    /**
     * Set reviewRating
     *
     * @param integer $reviewRating
     * @return Review
     */
    public function setReviewRating($reviewRating)
    {
        $this->reviewRating = $reviewRating;

        return $this;
    }

    /**
     * Get reviewRating
     *
     * @return integer 
     */
    public function getReviewRating()
    {
        return $this->reviewRating;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return Review
     */
    public function setCreateTimestamp($createTimestamp)
    {
        $this->createTimestamp = $createTimestamp;

        return $this;
    }

    /**
     * Get createTimestamp
     *
     * @return \DateTime 
     */
    public function getCreateTimestamp()
    {
        return $this->createTimestamp;
    }

    /**
     * Set updateTimestamp
     *
     * @param \DateTime $updateTimestamp
     * @return Review
     */
    public function setUpdateTimestamp($updateTimestamp)
    {
        $this->updateTimestamp = $updateTimestamp;

        return $this;
    }

    /**
     * Get updateTimestamp
     *
     * @return \DateTime 
     */
    public function getUpdateTimestamp()
    {
        return $this->updateTimestamp;
    }

    /**
     * Set reviewer
     *
     * @param \CB\ReviewerBundle\Entity\Reviewer $reviewer
     * @return Review
     */
    public function setReviewer(\CB\ReviewerBundle\Entity\Reviewer $reviewer = null)
    {
        $this->reviewer = $reviewer;

        return $this;
    }

    /**
     * Get reviewer
     *
     * @return \CB\ReviewerBundle\Entity\Reviewer 
     */
    public function getReviewer()
    {
        return $this->reviewer;
    }

    /**
     * Set phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return Review
     */
    public function setPhaseInstance(\CB\GrantBundle\Entity\PhaseInstance $phaseInstance = null)
    {
        $this->phaseInstance = $phaseInstance;

        return $this;
    }

    /**
     * Get phaseInstance
     *
     * @return \CB\GrantBundle\Entity\PhaseInstance 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }

    /**
     * Add criteriaNumber
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber
     * @return Review
     */
    public function addCriteriaNumber(\CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber)
    {
        $this->criteriaNumber[] = $criteriaNumber;

        return $this;
    }

    /**
     * Remove criteriaNumber
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber
     */
    public function removeCriteriaNumber(\CB\ReviewerBundle\Entity\EidrReviewCriteria $criteriaNumber)
    {
        $this->criteriaNumber->removeElement($criteriaNumber);
    }

    /**
     * Get criteriaNumber
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCriteriaNumber()
    {
        return $this->criteriaNumber;
    }

    /**
     * Add eidrReviewCriteriaScore
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteriaScore $eidrReviewCriteriaScore
     * @return Review
     */
    public function addEidrReviewCriteriaScore(\CB\ReviewerBundle\Entity\EidrReviewCriteriaScore $eidrReviewCriteriaScore)
    {
        $this->eidrReviewCriteriaScore[] = $eidrReviewCriteriaScore;

        return $this;
    }

    /**
     * Remove eidrReviewCriteriaScore
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteriaScore $eidrReviewCriteriaScore
     */
    public function removeEidrReviewCriteriaScore(\CB\ReviewerBundle\Entity\EidrReviewCriteriaScore $eidrReviewCriteriaScore)
    {
        $this->eidrReviewCriteriaScore->removeElement($eidrReviewCriteriaScore);
    }

    /**
     * Get eidrReviewCriteriaScore
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEidrReviewCriteriaScore()
    {
        return $this->eidrReviewCriteriaScore;
    }

    /**
     * Add eidrReviewCriteriaSubsectionAnswer
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsectionAnswer $eidrReviewCriteriaSubsectionAnswer
     * @return Review
     */
    public function addEidrReviewCriteriaSubsectionAnswer(\CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsectionAnswer $eidrReviewCriteriaSubsectionAnswer)
    {
        $this->eidrReviewCriteriaSubsectionAnswer[] = $eidrReviewCriteriaSubsectionAnswer;

        return $this;
    }

    /**
     * Remove eidrReviewCriteriaSubsectionAnswer
     *
     * @param \CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsectionAnswer $eidrReviewCriteriaSubsectionAnswer
     */
    public function removeEidrReviewCriteriaSubsectionAnswer(\CB\ReviewerBundle\Entity\EidrReviewCriteriaSubsectionAnswer $eidrReviewCriteriaSubsectionAnswer)
    {
        $this->eidrReviewCriteriaSubsectionAnswer->removeElement($eidrReviewCriteriaSubsectionAnswer);
    }

    /**
     * Get eidrReviewCriteriaSubsectionAnswer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEidrReviewCriteriaSubsectionAnswer()
    {
        return $this->eidrReviewCriteriaSubsectionAnswer;
    }
}
