<?php
namespace Models\Entities;

/**
 * @Entity
 */
class SingleCompetitor extends Competitor{
	
	/** @Column(name="first_name", type="string", nullable=false) **/
	protected $firstName;
	
	/** @Column(name="last_name", type="string", nullable=false) **/
	protected $lastName;
	
	/** @Column(name="password", type="string") **/
	protected $password;
	
	
	/** @Column(name="id_no", type="string", nullable=false) **/
	protected $idNo;
	
	/** 
	 * 
	 * @var \DateTime
	 * @Column(name="born_date", type="datetime", nullable=false) 
	 */
	protected $bornDate;
	
	/**
	 * 
	 * @var Image
	 * @OneToOne(targetEntity="Image")
	 * @JoinColumn(name="image_id", referencedColumnName="id")
	 */
	protected $image;
	
	/** @Column(name="eng_first_name", type="string", nullable=false) **/
	protected $firstNameEnglish;
	
	/** @Column(name="eng_last_name", type="string", nullable=false) **/
	protected $lastNameEnglish;
	
	/** @Column(name="id_passport", type="string", nullable=false) **/
	protected $passport;
	
	/** @Column(name="school_name", type="string", nullable=false) **/
	protected $schoolName;
	
	/** @Column(name="email", type="string", nullable=false) **/
	protected $email;
	
	/** @Column(name="phone", type="string", nullable=false) **/
	protected $phone;
	
	/** @Column(name="is_male", type="boolean", nullable=false) **/
	protected $isMale;
	
	/** @Column(name="address", type="string", nullable=false) **/
	protected $address;
	
	public function getFirstName()
	{
	    return $this->firstName;
	}

	public function setFirstName($firstName)
	{
	    $this->firstName = $firstName;
	}

	public function getLastName()
	{
	    return $this->lastName;
	}

	public function setLastName($lastName)
	{
	    $this->lastName = $lastName;
	}

	public function getIdNo()
	{
	    return $this->idNo;
	}

	public function setIdNo($idNo)
	{
	    $this->idNo = $idNo;
	}

	public function getBornDate()
	{
	    return $this->bornDate;
	}

	public function setBornDate($bornDate)
	{
	    $this->bornDate = $bornDate;
	}

	public function getImage()
	{
	    return $this->image;
	}

	public function setImage($image)
	{
	    $this->image = $image;
	}

	public function getFirstNameEnglish()
	{
	    return $this->firstNameEnglish;
	}

	public function setFirstNameEnglish($firstNameEnglish)
	{
	    $this->firstNameEnglish = $firstNameEnglish;
	}

	public function getLastNameEnglish()
	{
	    return $this->lastNameEnglish;
	}

	public function setLastNameEnglish($lastNameEnglish)
	{
	    $this->lastNameEnglish = $lastNameEnglish;
	}

	public function getPassport()
	{
	    return $this->passport;
	}

	public function setPassport($passport)
	{
	    $this->passport = $passport;
	}

	public function getSchoolName()
	{
	    return $this->schoolName;
	}

	public function setSchoolName($schoolName)
	{
	    $this->schoolName = $schoolName;
	}

	public function getEmail()
	{
	    return $this->email;
	}

	public function setEmail($email)
	{
	    $this->email = $email;
	}

	public function getPhone()
	{
	    return $this->phone;
	}

	public function setPhone($phone)
	{
	    $this->phone = $phone;
	}

	public function getIsMale()
	{
	    return $this->isMale;
	}

	public function setIsMale($isMale)
	{
	    $this->isMale = $isMale;
	}

	public function getAddress()
	{
	    return $this->address;
	}

	public function setAddress($address)
	{
	    $this->address = $address;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	
	
	
}