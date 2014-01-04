<?php
namespace Models\Entities;


use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="competitions")
 */
class Competition
{
	
	public function containProgram($age, $typeId){
		foreach ($this->getPrograms() as $program){
			/* @var $program \Models\Entities\Program */
			if($program->getAge() == $age && $program->getType()->getId()==$typeId) return true;
		}
		return false;
	}
	/**
	 * 
	 * @param unknown $age
	 * @param unknown $typeId
	 * @return \Models\Entities\Program|NULL
	 */
	public function getProgram($age, $typeId){
		foreach ($this->getPrograms() as $program){
			/* @var $program \Models\Entities\Program */
			if($program->getAge() == $age && $program->getType()->getId()==$typeId) return $program;
		}
		return null;
	}
	
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="name", type="string", nullable=false) **/
	protected $name;
	
	
	
	/**
	 * 
	 * @var Location
	 * @ManyToOne(targetEntity="Location")
	 * @JoinColumn(name="location_id", referencedColumnName="id")
	 */
	protected $location;
	
	/** @Column(name="html_schedule", type="string", nullable=true) **/
	protected $htmlSchedule;
	
	/** @Column(name="html_result", type="string", nullable=false) **/
	protected $htmlResult;
	

	/**
	 * 
	 * @var \DateTime
	 *  @Column(name="compet_start", type="date", nullable=false) 
	 */
	protected $competStart;
	
	
	/**
	 * 
	 * @var \DateTime
	 * @Column(name="compet_end", type="date", nullable=false)
	 */
	protected $competEnd;
	
	
	/**
	 * 
	 * @var ArrayCollection
	 * @ManyToMany(targetEntity="Type")
	 * @JoinTable(name="competition_types",
	 *      joinColumns={@JoinColumn(name="com_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="type_id", referencedColumnName="id", unique=true)}
	 *      )
	 **/
	private $types;
	
	
	/**
	 * 
	 * @var \DateTime
	 * @Column(name="regis_end", type="date", nullable=false)
	 */
	protected $registeringEnd;
	
	/** @Column(name="detail", type="string", nullable=false) **/
	protected $detail;
	
	/** @Column(name="max_compet", type="integer", nullable=true) **/
	protected $maxCompetitors;
	
	/** @Column(name="max_team", type="integer", nullable=true) **/
	protected $maxTeams;
	
	/** @Column(name="is_publish", type="boolean", nullable=false) **/
	protected  $isPublish;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive;
	
// 	/** @Column(name="ages", type="string", nullable=false) **/
// 	protected  $ages;

	/**
	 * 
	 * @var ArrayCollection
	 * @ManyToMany(targetEntity="Age")
	 * @JoinTable(name="age_competition",
	 *      joinColumns={@JoinColumn(name="age_id", referencedColumnName="id")},
	 *      inverseJoinColumns={@JoinColumn(name="compet_id", referencedColumnName="id")}
	 *      )
	 **/
	protected  $ages;
	
	
	/**
	 *
	 * @var ArrayCollection
	 * @OneToMany(targetEntity="Program", mappedBy="competition")
	 */
	protected $programs;
	
	/**
	 * 
	 * 
	 * @var File
	 * @OneToOne(targetEntity="File")
	 * @JoinColumn(name="schedule_file_id", referencedColumnName="id")
	 */
	protected $fileSchedule;
	
	/**
	 *
	 *
	 * @var File
	 * @OneToOne(targetEntity="File")
	 * @JoinColumn(name="result_file_id", referencedColumnName="id")
	 */
	protected $fileResult;
	
	
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getName() {
		return $this->name;
	}
	public function setName($name) {
		$this->name = $name;
		return $this;
	}
	public function getLocation() {
		return $this->location;
	}
	public function setLocation(Location $location) {
		$this->location = $location;
		return $this;
	}
	public function getCompetStart() {
		return $this->competStart;
	}
	public function setCompetStart(\DateTime $competStart) {
		$this->competStart = $competStart;
		return $this;
	}
	public function getCompetEnd() {
		return $this->competEnd;
	}
	public function setCompetEnd(\DateTime $competEnd) {
		$this->competEnd = $competEnd;
		return $this;
	}
	public function getTypes() {
		return $this->types;
	}
	public function setTypes(ArrayCollection $types) {
		$this->types = $types;
		return $this;
	}
	public function getRegisteringEnd() {
		return $this->registeringEnd;
	}
	public function setRegisteringEnd(\DateTime $registeringEnd) {
		$this->registeringEnd = $registeringEnd;
		return $this;
	}
	public function getDetail() {
		return $this->detail;
	}
	public function setDetail($detail) {
		$this->detail = $detail;
		return $this;
	}
	public function getMaxCompetitors() {
		return $this->maxCompetitors;
	}
	public function setMaxCompetitors($maxCompetitors) {
		$this->maxCompetitors = $maxCompetitors;
		return $this;
	}
	public function getMaxTeams() {
		return $this->maxTeams;
	}
	public function setMaxTeams($maxTeams) {
		$this->maxTeams = $maxTeams;
		return $this;
	}
	public function getIsPublish() {
		return $this->isPublish;
	}
	public function setIsPublish($isPublish) {
		$this->isPublish = $isPublish;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getAges() {
		return $this->ages;
	}
	public function setAges($ages) {
		$this->ages = $ages;
		return $this;
	}
	public function getPrograms() {
		return $this->programs;
	}
	public function setPrograms(ArrayCollection $programs) {
		$this->programs = $programs;
		return $this;
	}
	public function getFileSchedule() {
		return $this->fileSchedule;
	}
	public function setFileSchedule(File $fileSchedule) {
		$this->fileSchedule = $fileSchedule;
		return $this;
	}
	public function getFileResult() {
		return $this->fileResult;
	}
	public function setFileResult(File $fileResult) {
		$this->fileResult = $fileResult;
		return $this;
	}
	public function getHtmlSchedule() {
		return $this->htmlSchedule;
	}
	public function setHtmlSchedule($htmlSchedule) {
		$this->htmlSchedule = $htmlSchedule;
		return $this;
	}
	public function getHtmlResult() {
		return $this->htmlResult;
	}
	public function setHtmlResult($htmlResult) {
		$this->htmlResult = $htmlResult;
		return $this;
	}

	
	
	
	
	
	
	
	
	
	
	
	
	
}