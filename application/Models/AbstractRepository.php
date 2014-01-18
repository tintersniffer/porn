<?php
namespace Models;

use Doctrine\ORM\EntityManager;
use My\Factory\MyEntityManagerFactory;
use Doctrine\ORM\EntityRepository;
use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\Common\Collections\Selectable;
use Doctrine\DBAL\LockMode;

/**
 * 
 * @author Map
 */
abstract class AbstractRepository extends EntityRepository{
	
	public function save($entity, $flush = false){
			
		$this->_em->persist($entity);
		
		if($flush){
			$this->_em->flush($entity);
		}
	
	}	
	
	public function delete($entity, $flush = false){
		$this->_em->remove($entity);
		
		if($flush){
			$this->_em->flush($entity);
		}
	}
	
	
}