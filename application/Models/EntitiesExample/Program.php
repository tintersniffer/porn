<?php
namespace Models\Entities;


use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="programs")
 */
class Program
{
	
	public function matchWithCompetitor(SingleCompetitor $c){
// 		$ctime = new \DateTime();
		$ctime = $this->getCompetition()->getCompetStart();
		$cage = $ctime->format('Y') - $c->getBornDate()->format('Y');		
		$age = $this->getAge()->getAge();
		
		if(  ( $this->getAge()->getIsMaximum() && $cage>$age ) || ( !$this->getAge()->getIsMaximum() && $cage<$age ) || $this->getType()->getIsMale()!=$c->getIsMale()) return false;
		//echo "age=$age, cage=$cage, {$this->getAge()->getIsMaximum()}";
		return true;
	}
	
	public function matchWithCompetitorList(array $competitors){
		$result = array();
		foreach ($competitors as $c){
			if($this->matchWithCompetitor($c))
				array_push($result, $c);
		}
		return $result;
	}
	
	/**
	 * 
	 * @param unknown $competitorId
	 * @return RegisteredCompetitor|NULL
	 */
	public function getRegisteredCompetitor($competitorId){
		
		foreach ($this->getRegisteredCompetitors() as $rc){
			/* @var $competitor \Models\Entities\RegisteredCompetitor */
			if($rc->getCompetitor()->getId() == $competitorId) return $rc;
		}
		//echo "NOT FOUND";
		return null;
	}
	
	
	public function containCompetitor($id){
		foreach ($this->getRegisteredCompetitors() as $competitor){
			/* @var $competitor \Models\Entities\RegisteredCompetitor */
			if($competitor->getCompetitor()->getId() == $id) return true;
		}
		return false;
	}
	
	
	
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/**
	 * 
	 * @var Competition
	 * @ManyToOne(targetEntity="Competition", inversedBy="programs")
	 * @JoinColumn(name="compet_id", referencedColumnName="id")
	 */
	protected $competition;
	
// 	/** @Column(name="is_minimum_age", type="boolean", nullable=false) **/
// 	protected $isMinimumAge = false;
	
	/**
	 * 
	 * @var Type
	 * @ManyToOne(targetEntity="Type")
	 * @JoinColumn(name="type_id", referencedColumnName="id")
	 */
	protected $type;
	
// 	/** @Column(name="age", type="integer", nullable=false) **/
// 	protected $age;

	/**
	 * 
	 * @var Age
	 * @ManyToOne(targetEntity="Age")
	 * @JoinColumn(name="age_id", referencedColumnName="id")
	 */
	protected $age;
	
	/**
	 * 
	 * @var ArrayCollection
	 * @OneToMany(targetEntity="RegisteredCompetitor", mappedBy="program")
	 * 
	 */
	protected $registeredCompetitors;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive;
	
	
	/*
	 * 
	 * @var Group
	 * @OneToOne(targetEntity="Group", mappedBy="program")
	 *
	private $group;

	*/

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getCompetition()
	{
	    return $this->competition;
	}

	public function setCompetition($competition)
	{
	    $this->competition = $competition;
	}

	public function getType()
	{
	    return $this->type;
	}

	public function setType($type)
	{
	    $this->type = $type;
	}

	public function getAge()
	{
	    return $this->age;
	}

	public function setAge($age)
	{
	    $this->age = $age;
	}

	public function getRegisteredCompetitors()
	{
	    return $this->registeredCompetitors;
	}

	public function setRegisteredCompetitors($registeredCompetitors)
	{
	    $this->registeredCompetitors = $registeredCompetitors;
	}

	public function getIsActive()
	{
	    return $this->isActive;
	}

	public function setIsActive($isActive)
	{
	    $this->isActive = $isActive;
	}
	
	public function getIsMinimumAge() {
		return $this->isMinimumAge;
	}
	public function setIsMinimumAge($isMinimumAge) {
		$this->isMinimumAge = $isMinimumAge;
		return $this;
	}
	
	
	
	
}