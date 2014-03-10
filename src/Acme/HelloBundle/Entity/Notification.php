<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="fk_Notification_Account1_idx", columns={"account_ID"})})
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var string
     *
     * @ORM\Column(name="notification_summary", type="string", length=1000, nullable=false)
     */
    private $notificationSummary;

    /**
     * @var string
     *
     * @ORM\Column(name="notification_message", type="string", length=10000, nullable=true)
     */
    private $notificationMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_timestamp", type="datetime", nullable=false)
     */
    private $createTimestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="notification_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $notificationId;

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
     * Set notificationSummary
     *
     * @param string $notificationSummary
     * @return Notification
     */
    public function setNotificationSummary($notificationSummary)
    {
        $this->notificationSummary = $notificationSummary;

        return $this;
    }

    /**
     * Get notificationSummary
     *
     * @return string 
     */
    public function getNotificationSummary()
    {
        return $this->notificationSummary;
    }

    /**
     * Set notificationMessage
     *
     * @param string $notificationMessage
     * @return Notification
     */
    public function setNotificationMessage($notificationMessage)
    {
        $this->notificationMessage = $notificationMessage;

        return $this;
    }

    /**
     * Get notificationMessage
     *
     * @return string 
     */
    public function getNotificationMessage()
    {
        return $this->notificationMessage;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return Notification
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
     * Get notificationId
     *
     * @return integer 
     */
    public function getNotificationId()
    {
        return $this->notificationId;
    }

    /**
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return Notification
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
}
