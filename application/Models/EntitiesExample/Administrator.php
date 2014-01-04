<?php
namespace Models\Entities;


/**
 * @Entity
 */
class Administrator extends User
{
	/** @Column(name="permission", type="integer", nullable=false) **/
	private $permisstion;
	
	

	public function getPermisstion()
	{
	    return $this->permisstion;
	}

	public function setPermisstion($permisstion)
	{
	    $this->permisstion = $permisstion;
	}
}