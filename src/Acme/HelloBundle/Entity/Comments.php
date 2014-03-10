<?php

namespace Acme\HelloBundle\Entity;

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
     * @var integer
     *
     * @ORM\Column(name="comment_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $commentId;

    /**
     * @var \Acme\HelloBundle\Entity\Account
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Account")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $account;

    /**
     * @var \Acme\HelloBundle\Entity\Project
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Project")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     * })
     */
    private $project;

    /**
     * @var \Acme\HelloBundle\Entity\PhaseInstance
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\PhaseInstance")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phase_instance_ID", referencedColumnName="phase_instance_ID")
     * })
     */
    private $phaseInstance;

    /**
     * @var \Acme\HelloBundle\Entity\Comments
     *
     * @ORM\ManyToOne(targetEntity="Acme\HelloBundle\Entity\Comments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reply_from", referencedColumnName="comment_ID")
     * })
     */
    private $replyFrom;



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
     * Get commentId
     *
     * @return integer 
     */
    public function getCommentId()
    {
        return $this->commentId;
    }

    /**
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return Comments
     */
    public function setAccount(\Acme\HelloBundle\Entity\Account $account = null)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * Get account
     *
     * @return \Acme\HelloBundle\Entity\Account 
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * Set project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return Comments
     */
    public function setProject(\Acme\HelloBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \Acme\HelloBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set phaseInstance
     *
     * @param \Acme\HelloBundle\Entity\PhaseInstance $phaseInstance
     * @return Comments
     */
    public function setPhaseInstance(\Acme\HelloBundle\Entity\PhaseInstance $phaseInstance = null)
    {
        $this->phaseInstance = $phaseInstance;

        return $this;
    }

    /**
     * Get phaseInstance
     *
     * @return \Acme\HelloBundle\Entity\PhaseInstance 
     */
    public function getPhaseInstance()
    {
        return $this->phaseInstance;
    }

    /**
     * Set replyFrom
     *
     * @param \Acme\HelloBundle\Entity\Comments $replyFrom
     * @return Comments
     */
    public function setReplyFrom(\Acme\HelloBundle\Entity\Comments $replyFrom = null)
    {
        $this->replyFrom = $replyFrom;

        return $this;
    }

    /**
     * Get replyFrom
     *
     * @return \Acme\HelloBundle\Entity\Comments 
     */
    public function getReplyFrom()
    {
        return $this->replyFrom;
    }
}
