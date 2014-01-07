<?php
namespace Models\Entities;

 
/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\ServerRepository")
 * @Table(name="servers")
 */
Class Server
{ 
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="url", type="string") **/
	protected $url;
	
	/** @Column(name="protocal", type="string") **/
	protected $protocal;
	
	/** @Column(name="triggerUrl", type="string") **/
	protected $triggerUrl;

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
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getUrl() {
		return $this->url;
	}
	public function setUrl($url) {
		$this->url = $url;
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
	public function getProtocal() {
		return $this->protocal;
	}
	public function setProtocal($protocal) {
		$this->protocal = $protocal;
		return $this;
	}
	public function getTriggerUrl() {
		return $this->triggerUrl;
	}
	public function setTriggerUrl($triggerUrl) {
		$this->triggerUrl = $triggerUrl;
		return $this;
	}
	
	
	
	
	
	
	
}