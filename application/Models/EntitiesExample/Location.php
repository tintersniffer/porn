<?php
namespace Models\Entities;


/**
 * @Entity
 * @Table(name="locations")
 */
class Location
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="name", type="string", nullable=false) **/
	protected $name;
	
	/** @Column(name="address", type="string", nullable=false) **/
	protected $address;
	
	/** @Column(name="phone", type="string", nullable=false) **/
	protected $phone;
	
	/** @Column(name="latlng", type="string", nullable=false) **/
	protected $latlng;
	
	


	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getName()
	{
	    return $this->name;
	}

	public function setName($name)
	{
	    $this->name = $name;
	}

	public function getAddress()
	{
	    return $this->address;
	}

	public function setAddress($address)
	{
	    $this->address = $address;
	}

	public function getPhone()
	{
	    return $this->phone;
	}

	public function setPhone($phone)
	{
	    $this->phone = $phone;
	}

	public function getLatlng()
	{
	    return $this->latlng;
	}

	public function setLatlng($latlng)
	{
	    $this->latlng = $latlng;
	}
}