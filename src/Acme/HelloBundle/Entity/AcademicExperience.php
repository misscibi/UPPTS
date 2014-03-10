<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AcademicExperience
 *
 * @ORM\Table(name="academic_experience", indexes={@ORM\Index(name="fk_Academic_Experience_Account1_idx", columns={"account_ID"})})
 * @ORM\Entity
 */
class AcademicExperience
{
    /**
     * @var string
     *
     * @ORM\Column(name="academic_experience", type="string", length=10000, nullable=false)
     */
    private $academicExperience;

    /**
     * @var integer
     *
     * @ORM\Column(name="academic_experience_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $academicExperienceId;

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
     * Set academicExperience
     *
     * @param string $academicExperience
     * @return AcademicExperience
     */
    public function setAcademicExperience($academicExperience)
    {
        $this->academicExperience = $academicExperience;

        return $this;
    }

    /**
     * Get academicExperience
     *
     * @return string 
     */
    public function getAcademicExperience()
    {
        return $this->academicExperience;
    }

    /**
     * Get academicExperienceId
     *
     * @return integer 
     */
    public function getAcademicExperienceId()
    {
        return $this->academicExperienceId;
    }

    /**
     * Set account
     *
     * @param \Acme\HelloBundle\Entity\Account $account
     * @return AcademicExperience
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
