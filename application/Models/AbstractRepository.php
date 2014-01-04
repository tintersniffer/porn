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
abstract class AbstractRepository implements ObjectRepository{
	
	
	/**
	 * 
	 * @var EntityManager
	 */
	protected $_em;		
	
	/**
	 * 
	 * @var EntityRepository
	 */
	protected $_repository;
	
	
	/**
	 * 
	 * (Callable) aop closure function
	 */
	public $___aop_after;
	
	
	protected $isReadOnly = false;
	public function setIsReadOnly($isReadOnly) {
		
		if(! is_bool($isReadOnly)){
			throw new \Exception('$isReadOnly must be boolean type');
		}
		
		if($isReadOnly){
			$this->_em->flush();
		}
		
		$this->isReadOnly = $isReadOnly;
		return $this;
	}
	
	
	
	
	protected function __construct(){
		$this->_em = MyEntityManagerFactory::getEntityManager();
		
		$className = get_called_class();
		$entityName = str_replace('Repository', '', $className);	
			
		$this->_repository = $this->_em->getRepository($entityName);

		$this->___aop_after = function (){
			if($this->isReadOnly){
				$this->_repository->clear();
			}
		};
		
		aop_add_after("{$className}->save*()", $this->___aop_after);
		aop_add_after("{$className}->find*()", $this->___aop_after);
	}

	
	
	
	/**
	 * 
	 * @param object $entity
	 * @param boolean $flush
	 */
	public function save($entity){
		$this->_em->persist($entity);
	}
	
	
	/**
	 * Finds an entity by its primary key / identifier.
	 *
	 * @param mixed $id The identifier.
	 * @param integer $lockMode
	 * @param integer $lockVersion
	 *
	 * @return object The entity.
	 */
	public function find($id, $lockMode = LockMode::NONE, $lockVersion) {
		return $this->_repository->find($id, $lockMode, $lockVersion);
		
	}
	
	
	/**
	 * Finds a single entity by a set of criteria.
	 *
	 * @param array $criteria
	 * @param array|null $orderBy
	 * @return object
	 */
	public function findOneBy(array $criteria, array $orderBy = null){
		return $this->_repository->findOneBy($criteria, $orderBy);
	}
	
	
	/**
     * Finds all entities in the repository.
     *
     * @return array The entities.
     */
	public function findAll() {
		return $this->_repository->findAll();

	}
	
	
	
	/**
	 * Finds entities by a set of criteria.
	 *
	 * @param array $criteria
	 * @param array|null $orderBy
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return array The objects.
	 */
	public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) {		
		return $this->_repository->findBy($criteria, $orderBy, $limit, $offset);
	}
	
	
	/**
	 * @return string
	 */
	public function getClassName() {
		// TODO: Auto-generated method stub
		return $this->_repository->getClassName();
	}

	
}