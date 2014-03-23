<?php

namespace CB\AccountBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity
 * )
 */
class Account implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="account_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $accountId;

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
     * @ORM\Column(name="primary_email", type="integer", nullable=true)
     */
    private $primaryEmailAddress;
    
    /**
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @var \CB\AccountBundle\Entity\ContactEmail
     *
     * @ORM\OneToOne(targetEntity="CB\AccountBundle\Entity\ContactEmail", cascade={"ALL"})
     * @ORM\JoinColumn(name="primary_email", referencedColumnName="email_ID")
     */
    private $primaryEmail;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CB\GrantBundle\Entity\Grant", inversedBy="funder")
     * @ORM\JoinTable(name="funder",
     *   joinColumns={
     *     @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="grant_ID", referencedColumnName="grant_ID")
     *   }
     * )
     */
    private $fundedGrant;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="CB\ProjectBundle\Entity\Proponent", mappedBy="account")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $proponent;
    
    /**
     * @var ArrayCollection
     * 
     * @ORM\OneToMany(targetEntity="CB\AccountBundle\Entity\ContactEmail", mappedBy="account", cascade={"ALL"})
     * @ORM\JoinColumns({   
     *   @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    protected $contactEmail;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="ContactPhone", mappedBy="account", cascade={"ALL"})
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $contactPhone;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="account", cascade={"ALL"})
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $employee;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="Education", mappedBy="account", cascade={"ALL"})
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $education;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     * 
     * @ORM\OneToMany(targetEntity="AcademicExperience", mappedBy="account", cascade={"ALL"})
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="account_ID", referencedColumnName="account_ID")
     * })
     */
    private $academicExperience;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fundedGrant = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proponent = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contactEmail = new ArrayCollection();
        $this->contactPhone = new ArrayCollection();
        $this->employee = new ArrayCollection();
        $this->education = new ArrayCollection();
        $this->academicExperience = new ArrayCollection();
        
        $this->isActive = true;
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
     * Set primaryEmail
     *
     * @param \CB\AccountBundle\Entity\ContactEmail
     * @return Account
     */
    public function setPrimaryEmail(\CB\AccountBundle\Entity\ContactEmail $primaryEmail)
    {
        if(!$this->contactEmail->contains($primaryEmail)) {
            $this->addContactEmail($primaryEmail); 
        }
        
        $primaryEmail->setAccount($this);
        $this->primaryEmail = $primaryEmail;
        $this->username = $primaryEmail->getEmailAddress();
      
        return $this;
    }

    /**
     * Get primaryEmail
     *
     * @return \CB\AccountBundle\Entity\ContactEmail 
     */
    public function getPrimaryEmail()
    {
        return $this->primaryEmail;
    }

    /**
     * Add fundedGrant
     *
     * @param \CB\GrantBundle\Entity\Grant $fundedGrant
     * @return Account
     */
    public function addFundedGrant(\CB\GrantBundle\Entity\Grant $fundedGrant)
    {
        $this->fundedGrant[] = $fundedGrant;

        return $this;
    }

    /**
     * Remove fundedGrant
     *
     * @param \CB\GrantBundle\Entity\Grant $fundedGrant
     */
    public function removeFundedGrant(\CB\GrantBundle\Entity\Grant $fundedGrant)
    {
        $this->fundedGrant->removeElement($fundedGrant);
    }

    /**
     * Get fundedGrant
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFundedGrant()
    {
        return $this->fundedGrant;
    }

    /**
     * Add proponent
     *
     * @param \CB\ProjectBundle\Entity\Proponent $proponent
     * @return Account
     */
    public function addProponent(\CB\ProjectBundle\Entity\Proponent $proponent)
    {
        $this->proponent[] = $proponent;

        return $this;
    }

    /**
     * Remove proponent
     *
     * @param \CB\ProjectBundle\Entity\Proponent $proponent
     */
    public function removeProponent(\CB\ProjectBundle\Entity\Proponent $proponent)
    {
        $this->proponent->removeElement($proponent);
    }

    /**
     * Get proponent
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProponent()
    {
        return $this->proponent;
    }

    /**
     * Add contactEmail
     *
     * @param \CB\AccountBundle\Entity\ContactEmail $contactEmail
     * @return Account
     */
    public function addContactEmail(\CB\AccountBundle\Entity\ContactEmail $contactEmail)
    {
        $this->contactEmail[] = $contactEmail;
        $contactEmail->setAccount($this);

        return $this;
    }

    /**
     * Remove contactEmail
     *
     * @param \CB\AccountBundle\Entity\ContactEmail $contactEmail
     */
    public function removeContactEmail(\CB\AccountBundle\Entity\ContactEmail $contactEmail)
    {
        $this->contactEmail->removeElement($contactEmail);       
    }

    /**
     * Get contactEmail
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactEmail()
    {
        return $this->contactEmail;
    }

    /**
     * Add contactPhone
     *
     * @param \CB\AccountBundle\Entity\ContactPhone $contactPhone
     * @return Account
     */
    public function addContactPhone(\CB\AccountBundle\Entity\ContactPhone $contactPhone)
    {
        $this->contactPhone[] = $contactPhone;
        $contactPhone->setAccount($this);

        return $this;
    }

    /**
     * Remove contactPhone
     *
     * @param \CB\AccountBundle\Entity\ContactPhone $contactPhone
     */
    public function removeContactPhone(\CB\AccountBundle\Entity\ContactPhone $contactPhone)
    {
        $this->contactPhone->removeElement($contactPhone);
    }

    /**
     * Get contactPhone
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactPhone()
    {
        return $this->contactPhone;
    }

    /**
     * Add employee
     *
     * @param \CB\AccountBundle\Entity\Employee $employee
     * @return Account
     */
    public function addEmployoo(\CB\AccountBundle\Entity\Employee $employee)
    {
        $employee->setAccount($this);
        $this->employee[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \CB\AccountBundle\Entity\Employee $employee
     */
    public function removeEmployoo(\CB\AccountBundle\Entity\Employee $employee)
    {
        $this->employee->removeElement($employee);
    }

    /**
     * Get employee
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * Add education
     *
     * @param \CB\AccountBundle\Entity\Education $education
     * @return Account
     */
    public function addEducation(\CB\AccountBundle\Entity\Education $education)
    {
        $education->setAccount($this);
        $this->education[] = $education;

        return $this;
    }

    /**
     * Remove education
     *
     * @param \CB\AccountBundle\Entity\Education $education
     */
    public function removeEducation(\CB\AccountBundle\Entity\Education $education)
    {
        $this->education->removeElement($education);
    }

    /**
     * Get education
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Add academicExperience
     *
     * @param \CB\AccountBundle\Entity\AcademicExperience $academicExperience
     * @return Account
     */
    public function addAcademicExperience(\CB\AccountBundle\Entity\AcademicExperience $academicExperience)
    {
        $academicExperience->setAccount($this);
        $this->academicExperience[] = $academicExperience;

        return $this;
    }

    /**
     * Remove academicExperience
     *
     * @param \CB\AccountBundle\Entity\AcademicExperience $academicExperience
     */
    public function removeAcademicExperience(\CB\AccountBundle\Entity\AcademicExperience $academicExperience)
    {
        $this->academicExperience->removeElement($academicExperience);
    }

    /**
     * Get academicExperience
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAcademicExperience()
    {
        return $this->academicExperience;
    }

    /**
     * Set primaryEmailAddress
     *
     * @param integer $primaryEmailAddress
     * @return Account
     */
    public function setPrimaryEmailAddress($primaryEmailAddress)
    {
        $this->primaryEmailAddress = $primaryEmailAddress;

        return $this;
    }

    /**
     * Get primaryEmailAddress
     *
     * @return integer 
     */
    public function getPrimaryEmailAddress()
    {
        return $this->primaryEmailAddress;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        
        return array('ROLE_USER');
    }

    public function getSalt() {
        
        return null;
    }

    public function getUsername() {
        $this->username;                
    }

    public function serialize() {
        return serialize(array(
            $this->accountId,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    public function unserialize($serialized) {
        list (
            $this->accountId,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

}
