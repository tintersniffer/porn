<?php
namespace Models\Entities;


/**
 * @Entity
 * @Table(name="ages")
 */
class Age
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="age", type="integer", nullable=false) **/
	protected $age;
	
	/** @Column(name="IS_MAXIMUM", type="boolean", nullable=false) **/
	protected $isMaximum;
	
	public function toNormalizeName(){
		$result = '';
		if($this->isMaximum){
			$result = "รุ่นอายุไม่เกิน {$this->getAge()} ปี";
		}else{
			$result = "รุ่นอายุตั้งแต่่ {$this->getAge()} ปีขึ้นไป";
		}
		return $result;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getAge() {
		return $this->age;
	}
	public function setAge($age) {
		$this->age = $age;
		return $this;
	}
	public function getIsMaximum() {
		return $this->isMaximum;
	}
	public function setIsMaximum($isMaximum) {
		$this->isMaximum = $isMaximum;
		return $this;
	}
	


}