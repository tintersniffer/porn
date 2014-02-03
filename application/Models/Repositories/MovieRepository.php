<?php

namespace Models\Repositories;
use Models\AbstractRepository;
use Doctrine\Common\Collections\ArrayCollection;
class MovieRepository extends AbstractRepository{
	
	private $_countPerPage = 15;
	private $_cacheTime = 30;
	
	/**
	 * 
	 * @param integer $page
	 * @return array
	 */
	public function __findByPageNavigation($page){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('partial m.{id, movieName, friendlyName, coverUrl}')
		->orderBy('m.id','desc')
		->setFirstResult($this->_countPerPage*($page-1))
		->setMaxResults($this->_countPerPage);
		return 	$query->getQuery()->useResultCache(true,$this->_cacheTime)->getResult();
	}
	
	public function __findByPageNavigationWithCategory($page, $categoryId){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('partial m.{id, movieName, friendlyName, coverUrl}')
		->join('m.category', 'c')
		->where('c.id = :categoryId')
		->setFirstResult($this->_countPerPage*($page-1))
		->setMaxResults($this->_countPerPage);
		return $query->getQuery()->setParameter('categoryId', $categoryId)->useResultCache(true,$this->_cacheTime)->getResult();
	}
	
	public function __findMaxPageNavigation(){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('count(m.id)');
		return ceil(($query->getQuery()->useResultCache(true,$this->_cacheTime)->getSingleScalarResult())/$this->_countPerPage);
	}
	
	public function __findMaxPageNavigationWithCategory($categoryId){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('count(m.id)')
		->join('m.category', 'c')
		->where('c.id = :categoryId');
		return ceil(($query->getQuery()->setParameter('categoryId', $categoryId)->useResultCache(true,$this->_cacheTime)->getSingleScalarResult())/$this->_countPerPage);
	}
	
}