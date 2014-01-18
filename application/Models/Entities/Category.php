<?php
namespace Models\Entities;


/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\TypeRepository")
 * @Table(name="categories")
 */
Class Category
{
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="name", type="string") **/
	protected $name;
	
	/** @Column(name="description", type="string") **/
	protected $description;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive = true; 
	
	/**
	 *
	 * @var \DateTime
	 *  @Column(name="created_date", type="datetime", nullable=false)
	 */
	protected $createdDate;
	/**
	 *
	 * @var \DateTime
	 *  @Column(name="updated_date", type="datetime", nullable=true)
	 */
	protected $updatedDate;
	
	/** @Column(name="`order`", type="integer") **/
	protected $order = 5;
	
	
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
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getCreatedDate() {
		return $this->createdDate;
	}
	public function setCreatedDate(\DateTime $createdDate) {
		$this->createdDate = $createdDate;
		return $this;
	}
	public function getUpdatedDate() {
		return $this->updatedDate;
	}
	public function setUpdatedDate(\DateTime $updatedDate) {
		$this->updatedDate = $updatedDate;
		return $this;
	}
	public function getOrder() {
		return $this->order;
	}
	public function setOrder($order) {
		$this->order = $order;
		return $this;
	}
	
	

	
	
	
}