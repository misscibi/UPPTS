<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments", indexes={@ORM\Index(name="reply_from_idx", columns={"reply_from"}), @ORM\Index(name="fk_Comments_Phase_Instance1_idx", columns={"phase_instance_ID"}), @ORM\Index(name="fk_Comments_Project1_idx", columns={"project_ID"}), @ORM\Index(name="fk_Comments_Account1_idx", columns={"account_ID"})})
 * @ORM\Entity
 */
class Comments
{
    /**
     * @var integer
     *
     * @ORM\Column(name="comment_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentId;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_title", type="string", length=255, nullable=true)
     */
    private $commentTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="comment_description", type="string", length=10000, nullable=false)
     */
    private $commentDescription;

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
     * @var \CB\AccountBundle\Entity\Comments
     *
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reply_from", referencedColumnName="comment_ID")
     * })
     */
    private $replyFrom;

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
     * @var \CB\ProjectBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="CB\ProjectBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;

    /**
     * @var \CB\AccountBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="CB\AccountBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;



    /**
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set commentTitle
     *
     * @param string $commentTitle
     * @return Comments
     */
    public function setCommentTitle($commentTitle)
    {
        $this->commentTitle = $commentTitle;

        return $this;
    }

    /**
     * Get commentTitle
     *
     * @return string 
     */
    public function getCommentTitle()
    {
        return $this->commentTitle;
    }

    /**
     * Set commentDescription
     *
     * @param string $commentDescription
     * @return Comments
     */
    public function setCommentDescription($commentDescription)
    {
        $this->commentDescription = $commentDescription;

        return $this;
    }

    /**
     * Get commentDescription
     *
     * @return string 
     */
    public function getCommentDescription()
    {
        return $this->commentDescription;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return Comments
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
     * @return Comments
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
     * Set replyFrom
     *
     * @param \CB\AccountBundle\Entity\Comments $replyFrom
     * @return Comments
     */
    public function setReplyFrom(\CB\AccountBundle\Entity\Comments $replyFrom = null)
    {
        $this->replyFrom = $replyFrom;

        return $this;
    }

    /**
     * Get replyFrom
     *
     * @return \CB\AccountBundle\Entity\Comments 
     */
    public function getReplyFrom()
    {
        return $this->replyFrom;
    }

    /**
     * Set phaseInstance
     *
     * @param \CB\GrantBundle\Entity\PhaseInstance $phaseInstance
     * @return Comments
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
     * Set project
     *
     * @param \CB\ProjectBundle\Entity\Project $project
     * @return Comments
     */
    public function setProject(\CB\ProjectBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \CB\ProjectBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return Comments
     */
    public function setAccount(\CB\AccountBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \CB\AccountBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }
}
