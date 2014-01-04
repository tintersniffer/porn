<?php
namespace Models\Entities;


/**
 * @Entity
 * @Table(name="types")
 */
class Type
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="name", type="string", nullable=false) **/
	protected $name;
	
	/** @Column(name="distance", type="integer", nullable=false) **/
	protected $distance;
	
	/** @Column(name="is_male", type="boolean", nullable=false) **/
	protected $isMale;
	
	/** @Column(name="count", type="integer", nullable=false) **/
	protected $count;

	public function toNomalizeName(){
		$result = $this->getName().' ';
		if($this->getCount()==1){
			$result.=$this->getDistance().'เมตร ';
		}else{
			$result.='ทีม '.$this->getCount().'x'.$this->getDistance().'เมตร ';
		}
		$result .= $this->getIsMale()?'ชาย':'หญิง';
		return $result;
	}

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

	public function getDistance()
	{
	    return $this->distance;
	}

	public function setDistance($distance)
	{
	    $this->distance = $distance;
	}

	public function getIsMale()
	{
	    return $this->isMale;
	}

	public function setIsMale($isMale)
	{
	    $this->isMale = $isMale;
	}

	public function getCount()
	{
	    return $this->count;
	}

	public function setCount($count)
	{
	    $this->count = $count;
	}
}