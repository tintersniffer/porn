<?php
namespace Models\Entities;


/**
 * @Entity
 * @Table(name="users")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="specy", type="integer")
 * @DiscriminatorMap({ 1 = "Administrator"})
 */
class User
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="username", type="string", nullable=false, length=20) **/
	protected $username;
	
	/** @Column(name="password", type="string", nullable=false, length=32) **/
	protected $password;
	
	/** @Column(name="first_name", type="string", nullable=false, length=25) **/
	protected $firstName;
	
	/** @Column(name="last_name", type="string", nullable=false, length=25) **/
	protected $lastName;
	
	/** @Column(name="is_male", type="boolean", nullable=false) **/
	protected $isMale;
	
	/** @Column(name="email", type="string", nullable=false, length=25) **/
	protected $email;
	
	/** @Column(name="phone", type="string", nullable=false, length=25) **/
	protected $phone;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive;
	

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getUsername()
	{
	    return $this->username;
	}

	public function setUsername($username)
	{
	    $this->username = $username;
	}

	public function getPassword()
	{
	    return $this->password;
	}

	public function setPassword($password)
	{
	    $this->password = $password;
	}

	public function getIsMale()
	{
	    return $this->isMale;
	}

	public function setIsMale($isMale)
	{
	    $this->isMale = $isMale;
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

	public function getIsActive()
	{
	    return $this->isActive;
	}

	public function setIsActive($isActive)
	{
	    $this->isActive = $isActive;
	}
}