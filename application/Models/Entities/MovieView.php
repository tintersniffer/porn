<?php
namespace Models\Entities;


use Doctrine\DBAL\Types\Type;
use Doctrine\Common\Collections\ArrayCollection;
use Models\Services\VideoService;


/**
 * @Entity(readOnly=false)
 * @Table(name="movie_views", options={"engine"="MEMORY"})
 */
class MovieView
{
	
	
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected $id;
	
	/** @Column(name="view_count", type="integer") **/
	protected $viewCount;
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getViewCount() {
		return $this->viewCount;
	}
	public function setViewCount($viewCount) {
		$this->viewCount = $viewCount;
		return $this;
	}
	
	
}


