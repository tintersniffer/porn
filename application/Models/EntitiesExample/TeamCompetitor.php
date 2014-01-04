<?php
namespace Models\Entities;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 */
class TeamCompetitor extends Competitor{
	
	/** @Column(name="team_name", type="string") **/
	protected $teamName;
	
	/** @Column(name="team_member_string", type="string") **/
	protected $teamMemberString;
	
	/** @Column(name="remark", type="string") **/
	protected $remark;
	
	

	/**
	 * 
	 * @var ArrayCollection
	 * @ManyToMany(targetEntity="SingleCompetitor")
	 * @JoinTable(name="team_members",
	 * 		joinColumns={@JoinColumn(name="team_id", referencedColumnName="id")},
	 * 		inverseJoinColumns={@JoinColumn(name="member_id", referencedColumnName="id")}
	 * 		)
	 */
	protected $teamMember;
	
	

	public function getTeamName()
	{
	    return $this->teamName;
	}

	public function setTeamName($teamName)
	{
	    $this->teamName = $teamName;
	}

	public function getTeamMember()
	{
	    return $this->teamMember;
	}

	public function setTeamMember($teamMember)
	{
	    $this->teamMember = $teamMember;
	}
	public function getTeamMemberString() {
		return $this->teamMemberString;
	}
	public function setTeamMemberString($teamMemberString) {
		$this->teamMemberString = $teamMemberString;
		return $this;
	}
	public function getRemark() {
		return $this->remark;
	}
	public function setRemark($remark) {
		$this->remark = $remark;
		return $this;
	}
	
}