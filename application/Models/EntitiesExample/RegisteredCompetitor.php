<?php
namespace Models\Entities;


use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="registered_competitors")
 */
class RegisteredCompetitor
{	
	
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/**
	 *
	 * @var Program
	 * @ManyToOne(targetEntity="Program", inversedBy="registeredCompetitors")
	 * @JoinColumn(name="program_id", referencedColumnName="id")
	 **/
	protected $program;
	
	
	/**
	 *
	 * @var Competitor
	 * @ManyToOne(targetEntity="Competitor")
	 * @JoinColumn(name="competitor_id", referencedColumnName="id")
	 **/
	protected $competitor;
	
	
	
	/** @Column(name="used_time", type="decimal", nullable=true) **/
	protected $usedTime;
	

	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive = true;
	
	
	/** @Column(name="is_team", type="boolean", nullable=false) **/
	protected  $isTeam = false;
	
	/**
	 *
	 * @var Club
	 * @ManyToOne(targetEntity="Club")
	 * @JoinColumn(name="registerer_club_id", referencedColumnName="id")
	 **/
	protected $registererClub;
	
	/**
	 *
	 * @var Competitor
	 * @ManyToOne(targetEntity="Competitor")
	 * @JoinColumn(name="registerer_competitor_id", referencedColumnName="id")
	 **/
	protected $registererCompetitor;
	
	
	
	
	
	/** @Column(name="`group`", type="string", nullable=true) **/
	protected $group;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getProgram() {
		return $this->program;
	}
	public function setProgram(Program $program) {
		$this->program = $program;
		return $this;
	}
	
	/**
	 * @return SingleCompetitor|TeamCompetitor
	 */
	public function getCompetitor() {
		return $this->competitor;
	}
	public function setCompetitor(Competitor $competitor) {
		$this->competitor = $competitor;
		return $this;
	}
	public function getUsedTime() {
		return $this->usedTime;
	}
	public function setUsedTime($usedTime) {
		$this->usedTime = $usedTime;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getRegistererClub() {
		return $this->registererClub;
	}
	public function setRegistererClub(Club $registererClub) {
		$this->registererClub = $registererClub;
		return $this;
	}
	public function getRegistererCompetitor() {
		return $this->registererCompetitor;
	}
	public function setRegistererCompetitor(Competitor $registererCompetitor) {
		$this->registererCompetitor = $registererCompetitor;
		return $this;
	}
	public function getGroup() {
		return $this->group;
	}
	public function setGroup($group) {
		$this->group = $group;
		return $this;
	}
	public function getIsTeam() {
		return $this->isTeam;
	}
	public function setIsTeam($isTeam) {
		$this->isTeam = $isTeam;
		return $this;
	}
	
	
	

	
	
	
	
	
}