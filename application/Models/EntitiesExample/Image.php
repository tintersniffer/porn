<?php
namespace Models\Entities;


/** @Entity
 *  @Table(name="images")
 * */
class Image{
	
	/** @Id
	 *  @GeneratedValue(strategy="IDENTITY")
	 *  @Column(name="id", type="integer") **/
	private $id;
	
	/** @Column(name="is_shared", type="boolean") **/
	private $isShared;
	
	/** @Column(name="`key`", type="string", length=6, unique=true, nullable=true) **/
	private $key;
	
	/** @Column(name="name", type="string") **/
	private $name;
	
	/** @Column(name="md5", type="string", unique=true, nullable=true) **/
	private $md5;
	
	/** @Column(name="image_size_kb", type="decimal", nullable=false, precision=7, scale=1,nullable=true) **/
	private $sizeKb;
	
	/** @Column(name="uploaded_time", type="datetime") **/
	private $uploadedTime;	
	
	/** @Column(name="simple_text", type="string",nullable=true) **/
	private $simpleText;
	
	/**
	 * 
	 * @var Image
	 * @ManyToOne(targetEntity="Image", fetch="EAGER")
	 * @JoinColumn(name="image_ref_id", referencedColumnName="id")
	 */
	private $referenceImage;
	
	/**
	 * 
	 * @var User
	 * @ManyToOne(targetEntity="User")
	 * @JoinColumn(name="uploader_user_id", referencedColumnName="id")
	 */
	private $uploader;
	
	/** @Column(name="nick_name", type="string", nullable=true, length=100) **/
	private $nickName;
	
	
	
	/**
	 * 
	 * @Column(name="is_thumbnail", type="boolean", nullable=true) 
	 */
	private $isThumbnail;
	
	/**
	 *
	 * @Column(name="is_active", type="boolean")
	 */
	private $isActive;
	
	
	/**
	 * 
	 * @var Display
	 * @ManyToOne(targetEntity="Display", inversedBy="imageList")
	 * @JoinColumn(name="display_id", referencedColumnName="id", nullable=true)
	 **/
	private $display;
	

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getKey()
	{
	    return $this->key;
	}
	
	public function getKeyUsable(){
		if($this->getReferenceImage()==null) return $this->getKey();
		else return $this->getReferenceImage()->getKey();
	}

	public function setKey($key)
	{
	    $this->key = $key;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getMd5()
	{
	    return $this->md5;
	}

	public function setMd5($md5)
	{
	    $this->md5 = $md5;
	}

	public function getSizeKb()
	{
	    return $this->sizeKb;
	}

	public function setSizeKb($sizeKb)
	{
	    $this->sizeKb = $sizeKb;
	}

	public function getUploadedTime()
	{
	    return $this->uploadedTime;
	}

	public function setUploadedTime($uploadedTime)
	{
	    $this->uploadedTime = $uploadedTime;
	}

	/**
	 * 
	 * @return \Models\Entities\Image
	 */
	public function getReferenceImage()
	{
	    return $this->referenceImage;
	}

	public function setReferenceImage($referenceImage)
	{
	    $this->referenceImage = $referenceImage;
	}

	public function getUploader()
	{
	    return $this->uploader;
	}

	public function setUploader($uploader)
	{
	    $this->uploader = $uploader;
	}

	public function getIsShared()
	{
	    return $this->isShared;
	}

	public function setIsShared($isShared)
	{
	    $this->isShared = $isShared;
	}

	public function getNickName()
	{
	    return $this->nickName;
	}

	public function setNickName($nickName)
	{
	    $this->nickName = $nickName;
	}

	public function getProduct()
	{
	    return $this->product;
	}

	public function setProduct($product)
	{
	    $this->product = $product;
	}

	public function getSimpleText()
	{
	    return $this->simpleText;
	}

	public function setSimpleText($simpleText)
	{
	    $this->simpleText = $simpleText;
	}

	public function getIsThumbnail()
	{
	    return $this->isThumbnail;
	}

	public function setIsThumbnail($isThumbnail)
	{
	    $this->isThumbnail = $isThumbnail;
	}
	public function getDisplay() {
		return $this->display;
	}
	public function setDisplay($display) {
		$this->display = $display;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	
	
	
	
}