<?php
namespace Models\Entities;


use Doctrine\Common\Collections\ArrayCollection;
/**
 * @Entity
 * @Table(name="competitors")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="type", type="integer")
 * @DiscriminatorMap({ 1 = "SingleCompetitor", 2 = "TeamCompetitor"})
 */
class Competitor
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/**
	 * 
	 * @var Club
	 * @ManyToOne(targetEntity="Club")
	 * @JoinColumn(name="club_id", referencedColumnName="id")
	 */
	protected $club;

	public function getId()
	{
	    return $this->id;
	}

	public function setId($id)
	{
	    $this->id = $id;
	}

	public function getClub()
	{
	    return $this->club;
	}

	public function setClub($club)
	{
	    $this->club = $club;
	}
}