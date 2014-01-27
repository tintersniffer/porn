<?php
namespace Models\Entities;


/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\TypeRepository")
 * @Table(name="users")
 */
Class User
{

	
	/**
	 *  @Id
	 *  @Column(name="id", type="integer")
	 *  @generatedValue(strategy="IDENTITY")
	 */
	private $id;
	
	
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	
	
}