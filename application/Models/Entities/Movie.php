<?php
namespace Models\Entities;


use Doctrine\DBAL\Types\Type;
/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\MovieRepository")
 * @Table(name="movies")
 */
class Movie
{
    /** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected $id;
	
	/** @Column(name="movie_name", type="string") **/
	protected $movieName;
	
	/** @Column(name="movie_friendly_name", type="string") **/
	protected $friendlyName;
	
	/** @Column(name="description", type="string") **/
	protected $description;
	
	/** @Column(name="view_count", type="string") **/
	protected $viewCount = 0;
	
	/** @Column(name="is_active", type="boolean", nullable=false) **/
	protected  $isActive = true;
	
	/** @Column(name="is_publish", type="boolean", nullable=false) **/
	protected  $isPublish =false;

	/**
	 *
	 * @var \DateTime
	 *  @Column(name="created_date", type="datetime", nullable=false)
	 */
	protected $createdDate;
	/**
	 *
	 * @var \DateTime
	 *  @Column(name="updated_date", type="datetime", nullable=true)
	 */
	protected $updatedDate;

	/**
	 *
	 *
	 * @var File
	 * @OneToOne(targetEntity="File")
	 * @JoinColumn(name="high_quality_file_id", referencedColumnName="id")
	 */
	protected $highQualityFile;
	
	/**
	 * 
	 * 
	 * @var Type
	 * @ManyToOne(targetEntity="Category")
	 * @JoinColumn(name="category_id", referencedColumnName="id")
	 */
	protected $category;
	
	/**
	 * 
	 * 
	 * @var File
	 * @OneToOne(targetEntity="File")
	 * @JoinColumn(name="low_quality_file_id", referencedColumnName="id")
	 */
	protected $lowQualityFile;
	
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getMovieName() {
		return $this->movieName;
	}
	public function setMovieName($movieName) {
		$this->movieName = $movieName;
		return $this;
	}
	public function getFriendlyName() {
		return $this->friendlyName;
	}
	public function setFriendlyName($friendlyName) {
		$this->friendlyName = $friendlyName;
		return $this;
	}
	public function getDescription() {
		return $this->description;
	}
	public function setDescription($description) {
		$this->description = $description;
		return $this;
	}
	public function getViewCount() {
		return $this->viewCount;
	}
	public function setViewCount($viewCount) {
		$this->viewCount = $viewCount;
		return $this;
	}
	public function getIsActive() {
		return $this->isActive;
	}
	public function setIsActive($isActive) {
		$this->isActive = $isActive;
		return $this;
	}
	public function getIsPublish() {
		return $this->isPublish;
	}
	public function setIsPublish($isPublish) {
		$this->isPublish = $isPublish;
		return $this;
	}
	public function getCreatedDate() {
		return $this->createdDate;
	}
	public function setCreatedDate(\DateTime $createdDate) {
		$this->createdDate = $createdDate;
		return $this;
	}
	public function getUpdatedDate() {
		return $this->updatedDate;
	}
	public function setUpdatedDate(\DateTime $updatedDate) {
		$this->updatedDate = $updatedDate;
		return $this;
	}
	public function getHighQualityFile() {
		return $this->highQualityFile;
	}
	public function setHighQualityFile(File $highQualityFile) {
		$this->highQualityFile = $highQualityFile;
		return $this;
	}
	public function getCategory() {
		return $this->category;
	}
	public function setCategory(Type $category) {
		$this->category = $category;
		return $this;
	}
	public function getLowQualityFile() {
		return $this->lowQualityFile;
	}
	public function setLowQualityFile(File $lowQualityFile) {
		$this->lowQualityFile = $lowQualityFile;
		return $this;
	}
	

	
	
	
}


