<?php

namespace JCC\AccountManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
 */
class Account
{
    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthdate", type="date", nullable=false)
     */
    private $birthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="present_address_line_1", type="string", length=255, nullable=true)
     */
    private $presentAddressLine1;

    /**
     * @var string
     *
     * @ORM\Column(name="present_address_line_2", type="string", length=255, nullable=true)
     */
    private $presentAddressLine2;

    /**
     * @var string
     *
     * @ORM\Column(name="present_state_province", type="string", length=255, nullable=true)
     */
    private $presentStateProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="present_city", type="string", length=255, nullable=true)
     */
    private $presentCity;

    /**
     * @var string
     *
     * @ORM\Column(name="present_country", type="string", length=255, nullable=true)
     */
    private $presentCountry;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_same_address", type="boolean", nullable=true)
     */
    private $isSameAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="permanent_address_line_1", type="string", length=255, nullable=true)
     */
    private $permanentAddressLine1;

    /**
     * @var string
     *
     * @ORM\Column(name="permanent_address_line_2", type="string", length=255, nullable=true)
     */
    private $permanentAddressLine2;

    /**
     * @var string
     *
     * @ORM\Column(name="permanent_state_province", type="string", length=255, nullable=true)
     */
    private $permanentStateProvince;

    /**
     * @var string
     *
     * @ORM\Column(name="permanent_city", type="string", length=255, nullable=true)
     */
    private $permanentCity;

    /**
     * @var string
     *
     * @ORM\Column(name="permanent_country", type="string", length=255, nullable=true)
     */
    private $permanentCountry;

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
     * @ORM\Column(name="account_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accountId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Project", inversedBy="account")
     * @ORM\JoinTable(name="proponent",
     *   joinColumns={
     *     @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="project_ID", referencedColumnName="project_ID")
     *   }
     * )
     */
    private $project;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Acme\HelloBundle\Entity\Grant", inversedBy="account")
     * @ORM\JoinTable(name="funder",
     *   joinColumns={
     *     @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     *   }
     * )
     */
    private $grant;
    
    /**
     * @ORM\OneToMany(targetEntity="contact_email", mappedBy="category")
     */
    private $contactEmail;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->project = new \Doctrine\Common\Collections\ArrayCollection();
        $this->grant = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Account
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Account
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return Account
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set birthdate
     *
     * @param \DateTime $birthdate
     * @return Account
     */
    public function setBirthdate($birthdate)
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * Get birthdate
     *
     * @return \DateTime 
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Account
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set presentAddressLine1
     *
     * @param string $presentAddressLine1
     * @return Account
     */
    public function setPresentAddressLine1($presentAddressLine1)
    {
        $this->presentAddressLine1 = $presentAddressLine1;

        return $this;
    }

    /**
     * Get presentAddressLine1
     *
     * @return string 
     */
    public function getPresentAddressLine1()
    {
        return $this->presentAddressLine1;
    }

    /**
     * Set presentAddressLine2
     *
     * @param string $presentAddressLine2
     * @return Account
     */
    public function setPresentAddressLine2($presentAddressLine2)
    {
        $this->presentAddressLine2 = $presentAddressLine2;

        return $this;
    }

    /**
     * Get presentAddressLine2
     *
     * @return string 
     */
    public function getPresentAddressLine2()
    {
        return $this->presentAddressLine2;
    }

    /**
     * Set presentStateProvince
     *
     * @param string $presentStateProvince
     * @return Account
     */
    public function setPresentStateProvince($presentStateProvince)
    {
        $this->presentStateProvince = $presentStateProvince;

        return $this;
    }

    /**
     * Get presentStateProvince
     *
     * @return string 
     */
    public function getPresentStateProvince()
    {
        return $this->presentStateProvince;
    }

    /**
     * Set presentCity
     *
     * @param string $presentCity
     * @return Account
     */
    public function setPresentCity($presentCity)
    {
        $this->presentCity = $presentCity;

        return $this;
    }

    /**
     * Get presentCity
     *
     * @return string 
     */
    public function getPresentCity()
    {
        return $this->presentCity;
    }

    /**
     * Set presentCountry
     *
     * @param string $presentCountry
     * @return Account
     */
    public function setPresentCountry($presentCountry)
    {
        $this->presentCountry = $presentCountry;

        return $this;
    }

    /**
     * Get presentCountry
     *
     * @return string 
     */
    public function getPresentCountry()
    {
        return $this->presentCountry;
    }

    /**
     * Set isSameAddress
     *
     * @param boolean $isSameAddress
     * @return Account
     */
    public function setIsSameAddress($isSameAddress)
    {
        $this->isSameAddress = $isSameAddress;

        return $this;
    }

    /**
     * Get isSameAddress
     *
     * @return boolean 
     */
    public function getIsSameAddress()
    {
        return $this->isSameAddress;
    }

    /**
     * Set permanentAddressLine1
     *
     * @param string $permanentAddressLine1
     * @return Account
     */
    public function setPermanentAddressLine1($permanentAddressLine1)
    {
        $this->permanentAddressLine1 = $permanentAddressLine1;

        return $this;
    }

    /**
     * Get permanentAddressLine1
     *
     * @return string 
     */
    public function getPermanentAddressLine1()
    {
        return $this->permanentAddressLine1;
    }

    /**
     * Set permanentAddressLine2
     *
     * @param string $permanentAddressLine2
     * @return Account
     */
    public function setPermanentAddressLine2($permanentAddressLine2)
    {
        $this->permanentAddressLine2 = $permanentAddressLine2;

        return $this;
    }

    /**
     * Get permanentAddressLine2
     *
     * @return string 
     */
    public function getPermanentAddressLine2()
    {
        return $this->permanentAddressLine2;
    }

    /**
     * Set permanentStateProvince
     *
     * @param string $permanentStateProvince
     * @return Account
     */
    public function setPermanentStateProvince($permanentStateProvince)
    {
        $this->permanentStateProvince = $permanentStateProvince;

        return $this;
    }

    /**
     * Get permanentStateProvince
     *
     * @return string 
     */
    public function getPermanentStateProvince()
    {
        return $this->permanentStateProvince;
    }

    /**
     * Set permanentCity
     *
     * @param string $permanentCity
     * @return Account
     */
    public function setPermanentCity($permanentCity)
    {
        $this->permanentCity = $permanentCity;

        return $this;
    }

    /**
     * Get permanentCity
     *
     * @return string 
     */
    public function getPermanentCity()
    {
        return $this->permanentCity;
    }

    /**
     * Set permanentCountry
     *
     * @param string $permanentCountry
     * @return Account
     */
    public function setPermanentCountry($permanentCountry)
    {
        $this->permanentCountry = $permanentCountry;

        return $this;
    }

    /**
     * Get permanentCountry
     *
     * @return string 
     */
    public function getPermanentCountry()
    {
        return $this->permanentCountry;
    }

    /**
     * Set createTimestamp
     *
     * @param \DateTime $createTimestamp
     * @return Account
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
     * @return Account
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
     * Get accountId
     *
     * @return integer 
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * Add project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     * @return Account
     */
    public function addProject(\Acme\HelloBundle\Entity\Project $project)
    {
        $this->project[] = $project;

        return $this;
    }

    /**
     * Remove project
     *
     * @param \Acme\HelloBundle\Entity\Project $project
     */
    public function removeProject(\Acme\HelloBundle\Entity\Project $project)
    {
        $this->project->removeElement($project);
    }

    /**
     * Get project
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Add grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     * @return Account
     */
    public function addGrant(\Acme\HelloBundle\Entity\Grant $grant)
    {
        $this->grant[] = $grant;

        return $this;
    }

    /**
     * Remove grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     */
    public function removeGrant(\Acme\HelloBundle\Entity\Grant $grant)
    {
        $this->grant->removeElement($grant);
    }

    /**
     * Get grant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrant()
    {
        return $this->grant;
    }
    
    /**
     * Add grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     * @return Account
     */
    public function addGrant(\Acme\HelloBundle\Entity\Grant $grant)
    {
        $this->grant[] = $grant;

        return $this;
    }

    /**
     * Remove grant
     *
     * @param \Acme\HelloBundle\Entity\Grant $grant
     */
    public function removeGrant(\Acme\HelloBundle\Entity\Grant $grant)
    {
        $this->grant->removeElement($grant);
    }

    /**
     * Get grant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGrant()
    {
        return $this->grant;
    }
}
