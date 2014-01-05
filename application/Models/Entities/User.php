<?php

namespace Models\Entities;

/**
 * @Entity(readOnly=false, repositoryClass="\Models\Repositories\UserRepository")
 * @Table(name="users")
 */
class User {
	
	/** @Id
	 * @Column(name="id", type="integer")
	 * @GeneratedValue(strategy="IDENTITY") **/
	protected  $id;
	
	
	/** @Column(name="username", type="string", nullable=false) **/
	protected $username;
	public function getId() {
		return $this->id;
	}
	public function setId($id) {
		$this->id = $id;
		return $this;
	}
	public function getUsername() {
		return $this->username;
	}
	public function setUsername($username) {
		$this->username = $username;
		return $this;
	}
	
	
		
	
}