<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Education
 *
 * @ORM\Table(name="education", indexes={@ORM\Index(name="fk_Education_Account1_idx", columns={"account_ID"})})
 * @ORM\Entity
 */
class Education
{
    /**
     * @var integer
     *
     * @ORM\Column(name="education_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $educationId;

    /**
     * @var string
     *
     * @ORM\Column(name="degree", type="string", length=255, nullable=false)
     */
    private $degree;

    /**
     * @var string
     *
     * @ORM\Column(name="specialization", type="string", length=255, nullable=true)
     */
    private $specialization;

    /**
     * @var string
     *
     * @ORM\Column(name="university", type="string", length=1000, nullable=false)
     */
    private $university;

    /**
     * @var string
     *
     * @ORM\Column(name="constituent_university", type="string", length=1000, nullable=true)
     */
    private $constituentUniversity;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="graduation_date", type="date", nullable=false)
     */
    private $graduationDate;

    /**
     * @var string
     *
     * @ORM\Column(name="academic_experience", type="string", length=10000, nullable=true)
     */
    private $academicExperience;

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
     * Get educationId
     *
     * @return integer 
     */
    public function getEducationId()
    {
        return $this->educationId;
    }

    /**
     * Set degree
     *
     * @param string $degree
     * @return Education
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;

        return $this;
    }

    /**
     * Get degree
     *
     * @return string 
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Set specialization
     *
     * @param string $specialization
     * @return Education
     */
    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;

        return $this;
    }

    /**
     * Get specialization
     *
     * @return string 
     */
    public function getSpecialization()
    {
        return $this->specialization;
    }

    /**
     * Set university
     *
     * @param string $university
     * @return Education
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string 
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Set constituentUniversity
     *
     * @param string $constituentUniversity
     * @return Education
     */
    public function setConstituentUniversity($constituentUniversity)
    {
        $this->constituentUniversity = $constituentUniversity;

        return $this;
    }

    /**
     * Get constituentUniversity
     *
     * @return string 
     */
    public function getConstituentUniversity()
    {
        return $this->constituentUniversity;
    }

    /**
     * Set graduationDate
     *
     * @param \DateTime $graduationDate
     * @return Education
     */
    public function setGraduationDate($graduationDate)
    {
        $this->graduationDate = $graduationDate;

        return $this;
    }

    /**
     * Get graduationDate
     *
     * @return \DateTime 
     */
    public function getGraduationDate()
    {
        return $this->graduationDate;
    }

    /**
     * Set academicExperience
     *
     * @param string $academicExperience
     * @return Education
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
     * Set account
     *
     * @param \CB\AccountBundle\Entity\Account $account
     * @return Education
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
