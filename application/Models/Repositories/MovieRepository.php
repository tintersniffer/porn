<?php

namespace Models\Repositories;
use Models\AbstractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Platforms\Keywords\KeywordList;
class MovieRepository extends AbstractRepository{
	
	private $_countPerPage = 15;
	private $_cacheTime = 15;
	

	public function __findByPageNavigation($page){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('partial m.{id, movieName, friendlyName, coverUrl}')
		->orderBy('m.id','desc')
		->setFirstResult($this->_countPerPage*($page-1))
		->setMaxResults($this->_countPerPage);
		return 	$query->getQuery()->useResultCache(true,$this->_cacheTime)->getResult();
	}
	
	public function __findRandomRelatedMovies($movieId){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('partial m.{id, movieName, friendlyName, coverUrl, screenShotUrl}')
		->addSelect('RAND() as HIDDEN rand')
		->orderBy('rand')
		->setMaxResults(27);
		return 	$query->getQuery()->useResultCache(true,120)->getResult();
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
	
	public function __findByPageAndKeywords($keywords = array(), $page){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('partial m.{id, movieName, friendlyName, coverUrl}');
		
		
		if(is_array($keywords)){
			$i = 1;
			foreach ($keywords as $kw){
				$query->andWhere('m.movieName like ?'.$i)
				->setParameter($i, "%{$kw}%");
			}			
		}
		
		$page = intval($page);
		$query->orderBy('m.id','desc')
		->setFirstResult($this->_countPerPage*($page-1))
		->setMaxResults($this->_countPerPage);
		
		return 	$query->getQuery()->useResultCache(false)->getResult();
	}
	
	public function __findMaxPageNavigationWithKeyword($keywords = array()){
		$query = $this->createQueryBuilder('m')
		->resetDQLPart('select')
		->select('count(m.id)');
		
		if(is_array($keywords)){
			$i = 1;
			foreach ($keywords as $kw){
				$query->andWhere('m.movieName like ?'.$i)
				->setParameter($i, "%{$kw}%");
			}
		}		
		return ceil(($query->getQuery()->useResultCache(false)->getSingleScalarResult())/$this->_countPerPage);
	}
	
}