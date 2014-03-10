<?php

namespace Acme\HelloBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UniversityEmployee
 *
 * @ORM\Table(name="university_employee")
 * @ORM\Entity
 */
class UniversityEmployee
{
    /**
     * @var string
     *
     * @ORM\Column(name="department", type="string", length=255, nullable=false)
     */
    private $department;

    /**
     * @var string
     *
     * @ORM\Column(name="constituent_university", type="string", length=1000, nullable=true)
     */
    private $constituentUniversity;

    /**
     * @var string
     *
     * @ORM\Column(name="academic_experience", type="string", length=10000, nullable=true)
     */
    private $academicExperience;

    /**
     * @var \Acme\HelloBundle\Entity\Employee
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Acme\HelloBundle\Entity\Employee")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="employment_ID", referencedColumnName="employment_ID")
     * })
     */
    private $employment;



    /**
     * Set department
     *
     * @param string $department
     * @return UniversityEmployee
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return string 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set constituentUniversity
     *
     * @param string $constituentUniversity
     * @return UniversityEmployee
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
     * Set academicExperience
     *
     * @param string $academicExperience
     * @return UniversityEmployee
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
     * Set employment
     *
     * @param \Acme\HelloBundle\Entity\Employee $employment
     * @return UniversityEmployee
     */
    public function setEmployment(\Acme\HelloBundle\Entity\Employee $employment)
    {
        $this->employment = $employment;

        return $this;
    }

    /**
     * Get employment
     *
     * @return \Acme\HelloBundle\Entity\Employee 
     */
    public function getEmployment()
    {
        return $this->employment;
    }
}
