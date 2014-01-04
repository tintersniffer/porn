<?php
namespace Models\Entities;


/**
 * @Entity
 * @Table(name="clubs")
 */
class Club
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="name", type="string", nullable=false) **/
	protected $name;
	
	/** @Column(name="username", type="string", nullable=false) **/
	protected $username;
	

	/** @Column(name="password", type="string", nullable=false) **/
	protected $password;
	
	/** @Column(name="email", type="string", nullable=false) **/
	protected $email;
	
	/** @Column(name="phone", type="string", nullable=false) **/
	protected $phone;
	
	/** @Column(name="address", type="string", nullable=false) **/
	protected $address;
	
	/** @Column(name="contact_info", type="string", nullable=true) **/
	protected $contactInfo;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive;
	
	/** @Column(name="is_verify", type="boolean", nullable=false) **/
	protected  $isVerify;
	
	/**
	 *
	 * @var \DateTime
	 *  @Column(name="created_date", type="datetime", nullable=false)
	 */
	protected $createdDate;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	public function getPassword() {
		return $this->password;
	}
	public function setPassword($password) {
		$this->password = $password;
		return $this;
	}
	public function getEmail() {
		return $this->email;
	}
	public function setEmail($email) {
		$this->email = $email;
		return $this;
	}
	public function getPhone() {
		return $this->phone;
	}
	public function setPhone($phone) {
		$this->phone = $phone;
		return $this;
	}
	public function getAddress() {
		return $this->address;
	}
	public function setAddress($address) {
		$this->address = $address;
		return $this;
	}
	public function getContactInfo() {
		return $this->contactInfo;
	}
	public function setContactInfo($contactInfo) {
		$this->contactInfo = $contactInfo;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getIsVerify() {
		return $this->isVerify;
	}
	public function setIsVerify($isVerify) {
		$this->isVerify = $isVerify;
		return $this;
	}
	public function getCreatedDate() {
		return $this->createdDate;
	}
	public function setCreatedDate(\DateTime $createdDate) {
		$this->createdDate = $createdDate;
		return $this;
	}
	

	
	
	
	


}


