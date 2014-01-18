<?php
namespace Models\Entities;


/** @Entity(readOnly=false, repositoryClass="\Models\Repositories\ImageRepository")
 *  @Table(name="images")
 * */
class Image{
	
	/** @Id
	 *  @GeneratedValue(strategy="IDENTITY")
	 *  @Column(name="id", type="integer") **/
	private $id;
	
	/** @Column(name="is_shared", type="boolean") **/
	private $isShared = false;
	
	/** @Column(name="`key`", type="string", length=6, unique=true, nullable=true) **/
	private $key;
	
	/** @Column(name="name", type="string") **/
	private $name;
	
	/** @Column(name="md5", type="string", unique=true, nullable=true) **/
	private $md5;
	
	/** @Column(name="image_size_kb", type="decimal", nullable=false, precision=7, scale=1,nullable=true) **/
	private $sizeKb;
	
	/** 
	 * 
	 * 
	 * @var \DateTime
	 * @Column(name="uploaded_time", type="datetime") **/
	private $uploadedTime;	
	
	
	/**
	 * 
	 * @var Image
	 * @ManyToOne(targetEntity="Image", fetch="EAGER")
	 * @JoinColumn(name="image_ref_id", referencedColumnName="id")
	 */
	private $referenceImage;
	
	/**
	 *
	 * @var Movie
	 * @ManyToOne(targetEntity="Movie", inversedBy="movies")
	 * @JoinColumn(name="movie_id", referencedColumnName="id")
	 */
	protected $movie;


	public function getRealKey(){
		if($this->getReferenceImage()==null) return $this->getKey();
		else return $this->getReferenceImage()->getKey();
	}
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getIsShared() {
		return $this->isShared;
	}
	public function setIsShared($isShared) {
		$this->isShared = $isShared;
		return $this;
	}
	public function getKey() {
		return $this->key;
	}
	public function setKey($key) {
		$this->key = $key;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getMd5() {
		return $this->md5;
	}
	public function setMd5($md5) {
		$this->md5 = $md5;
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
	public function setUploadedTime(\DateTime $uploadedTime) {
		$this->uploadedTime = $uploadedTime;
		return $this;
	}
	public function getReferenceImage() {
		return $this->referenceImage;
	}
	public function setReferenceImage(  $referenceImage) {
		$this->referenceImage = $referenceImage;
		return $this;
	}
	public function getMovie() {
		return $this->movie;
	}
	public function setMovie($movie) {
		$this->movie = $movie;
		return $this;
	}
	
	
	
	

}