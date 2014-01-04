<?php
namespace Models\Entities;


/** @Entity
 *  @Table(name="files")
 * */
class File{
	
	public function getKeyUsable(){
		if($this->getReferenceFile()==null) return $this->getKey();
		else return $this->getReferenceFile()->getKey();
	}
	
	/** @Id
	 *  @GeneratedValue(strategy="IDENTITY")
	 *  @Column(name="id", type="integer") **/
	private $id;
	
	
	/** @Column(name="`key`", type="string", length=6, unique=true, nullable=true) **/
	private $key;
	
	/** @Column(name="md5", type="string", unique=true, nullable=true) **/
	private $md5;
	
	/** @Column(name="name", type="string") **/
	private $name;
		
	/** @Column(name="size_kb", type="decimal", nullable=false, precision=7, scale=1,nullable=true) **/
	private $sizeKb;
	
	/** @Column(name="uploaded_time", type="datetime") **/
	private $uploadedTime;		
	
	/**
	 * 
	 * @var User
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="uploader_user_id", referencedColumnName="id")
	 */
	private $uploader;
	
	
	/**
	 *
	 * @Column(name="is_active", type="boolean")
	 */
	private $isActive;
	
	/**
	 *
	 * @var File
	 * @ManyToOne(targetEntity="File", fetch="EAGER")
	 * @JoinColumn(name="file_ref_id", referencedColumnName="id")
	 */
	private $referenceFile;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getKey() {
		return $this->key;
	}
	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	public function getMd5() {
		return $this->md5;
	}
	public function setMd5($md5) {
		$this->md5 = $md5;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getSizeKb() {
		return $this->sizeKb;
	}
	public function setSizeKb($sizeKb) {
		$this->sizeKb = $sizeKb;
		return $this;
	}
	public function getUploadedTime() {
		return $this->uploadedTime;
	}
	public function setUploadedTime($uploadedTime) {
		$this->uploadedTime = $uploadedTime;
		return $this;
	}
	public function getUploader() {
		return $this->uploader;
	}
	public function setUploader(User $uploader) {
		$this->uploader = $uploader;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getReferenceFile() {
		return $this->referenceFile;
	}
	public function setReferenceFile(File $referenceFile) {
		$this->referenceFile = $referenceFile;
		return $this;
	}
	
	
	
	
	
}