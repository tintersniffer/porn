<?php
namespace Models\Entities;


/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\ServerRepository")
 * @Table(name="servers")
 */
Class Server
{
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	/** @Column(name="url", type="string") **/
	protected $url;

	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getUrl() {
		return $this->url;
	}
	public function setUrl($url) {
		$this->url = $url;
		return $this;
	}
	
	
	
}