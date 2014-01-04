<?php
namespace Models\Entities;


/** @Entity
 *  @Table(name="display")
 * */
class Display{
	
	/** @Id  
	 *  @Column(name="id", type="string") 
	 ***/
	private $id;
	
	/** @Column(name="`key`", type="string") **/
	private  $key;
	
	/** @Column(name="header", type="string") **/
	private  $header;
	
	/** @Column(name="item1", type="string") **/
	private $item1;
	
	/** @Column(name="item2", type="string") **/
	private $item2;
	
	/** @Column(name="item3", type="string") **/
	private $item3;
	
	/**
	 * 
	 * @var Image
	 * @OneToOne(targetEntity="Image")
	 * @JoinColumn(name="image_id", referencedColumnName="id")
	 **/
	private $image;

	/**
	 * 
	 * @OneToMany(targetEntity="Image", mappedBy="display")
	 */
	private $imageList;
	
	
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
	public function getHeader() {
		return $this->header;
	}
	public function setHeader($header) {
		$this->header = $header;
		return $this;
	}
	public function getItem1() {
		return $this->item1;
	}
	public function setItem1($item1) {
		$this->item1 = $item1;
		return $this;
	}
	public function getItem2() {
		return $this->item2;
	}
	public function setItem2($item2) {
		$this->item2 = $item2;
		return $this;
	}
	public function getItem3() {
		return $this->item3;
	}
	public function setItem3($item3) {
		$this->item3 = $item3;
		return $this;
	}
	public function getImage() {
		return $this->image;
	}
	public function setImage(Image $image) {
		$this->image = $image;
		return $this;
	}
	public function getImageList() {
		return $this->imageList;
	}
	public function setImageList($imageList) {
		$this->imageList = $imageList;
		return $this;
	}
	
	
	
}