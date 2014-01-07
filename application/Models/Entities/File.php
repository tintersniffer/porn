<?php
namespace Models\Entities;


/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\FileRepository")
 * @Table(name="files")
 */
Class File
{
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="folder_name", type="string") **/
	protected $folderName;
	
	/** @Column(name="file_name", type="string") **/
	protected $fileName;

	/** @Column(name="quality", type="string") **/
	protected $quality;
	/**
	 *
	 * @var Server
	 * @ManyToOne(targetEntity="Server")
	 * @JoinColumn(name="server_id", referencedColumnName="id")
	 */
	protected $server;

	public function getQuality() {
		return $this->quality;
	}
	public function setQuality($quality) {
		$this->quality = $quality;
		return $this;
	}
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getFolderName() {
		return $this->folderName;
	}
	public function setFolderName($folderName) {
		$this->folderName = $folderName;
		return $this;
	}
	public function getFileName() {
		return $this->fileName;
	}
	public function setFileName($fileName) {
		$this->fileName = $fileName;
		return $this;
	}
	public function getServer() {
		return $this->server;
	}
	public function setServer(Server $server) {
		$this->server = $server;
		return $this;
	}
	public function getMovie() {
		return $this->movie;
	}
	public function setMovie(Movie $movie) {
		$this->movie = $movie;
		return $this;
	}
	
	
	
	
}