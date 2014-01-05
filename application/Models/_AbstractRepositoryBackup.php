// <?php
// namespace Models;

// use Doctrine\ORM\EntityManager;
// use My\Factory\MyEntityManagerFactory;
// use Doctrine\ORM\EntityRepository;
// use Doctrine\Common\Persistence\ObjectRepository;
// use Doctrine\Common\Collections\Selectable;
// use Doctrine\DBAL\LockMode;

// /**
//  * 
//  * @author Map
//  */
// abstract class AbstractRepository extends EntityRepository{
	
	
// 	/**
// 	 * 
// 	 * @var EntityManager
// 	 */
// 	protected $_em;		
	
// 	/**
// 	 * 
// 	 * @var EntityRepository
// 	 */
// 	protected $doctrineRepository;
	
	

	
// 	protected $isReadOnly = false;
// 	public function setIsReadOnly($isReadOnly) {
		
// 		if(! is_bool($isReadOnly)){
// 			throw new \Exception('$isReadOnly must be boolean type');
// 		}
		
// 		if($isReadOnly){
// 			$this->_em->flush();
// 		}
		
// 		$this->isReadOnly = $isReadOnly;
// 		return $this;
// 	}
	
	
	
// 	public function getTransaction(){
// 	}
	
	
	
// 	protected function __construct(){
// 		$this->_em = MyEntityManagerFactory::getEntityManager();
		
// 		$className = get_called_class();
// 		$entityName = str_replace('Repository', '', $className);
// 		$entityName = str_replace('Repositories', 'Entities', $entityName);
			
// 		$this->doctrineRepository = $this->_em->getRepository($entityName);
// 		$repo = $this;
		
// 		$___aop_after = function () use ($repo){
// 			if($repo->getIsReadOnly()){
// 				$repo->getDoctrineRepository()->clear();
// 			}
// 		};
		
// 		\aop_add_after("{$className}->save*()", $___aop_after);
// 		\aop_add_after("{$className}->find*()", $___aop_after);
// 	}
	
// 	/**
// 	 * 
// 	 * @var AbstractRepository
// 	 */
// 	protected static $instance;

//     final public static function getInstance()
//     {
//         $class = get_called_class();
//         if(!static::$instance)
//             static::$instance = new $class();

//         return static::$instance;
//     }

	
	
	
// 	/**
// 	 * 
// 	 * @param object $entity
// 	 * @param boolean $flush
// 	 */
// 	public function save($entity, $flush = true){
// 		$this->_em->persist($entity);
		
// 		if($flush){
// 			$this->_em->flush();
// 		}
// 	}
	
	
// 	/**
// 	 * Finds an entity by its primary key / identifier.
// 	 *
// 	 * @param mixed $id The identifier.
// 	 * @param integer $lockMode
// 	 * @param integer $lockVersion
// 	 *
// 	 * @return object The entity.
// 	 */
// 	public function find($id, $lockMode = LockMode::NONE, $lockVersion) {
// 		return $this->doctrineRepository->find($id, $lockMode, $lockVersion);
		
// 	}
	
	
// 	/**
// 	 * Finds a single entity by a set of criteria.
// 	 *
// 	 * @param array $criteria
// 	 * @param array|null $orderBy
// 	 * @return object
// 	 */
// 	public function findOneBy(array $criteria, array $orderBy = null){
// 		return $this->doctrineRepository->findOneBy($criteria, $orderBy);
// 	}
	
	
// 	/**
//      * Finds all entities in the repository.
//      *
//      * @return array The entities.
//      */
// 	public function findAll() {
// 		return $this->doctrineRepository->findAll();

// 	}
	
	
	
// 	/**
// 	 * Finds entities by a set of criteria.
// 	 *
// 	 * @param array $criteria
// 	 * @param array|null $orderBy
// 	 * @param int|null $limit
// 	 * @param int|null $offset
// 	 * @return array The objects.
// 	 */
// 	public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) {		
// 		return $this->doctrineRepository->findBy($criteria, $orderBy, $limit, $offset);
// 	}
	
	
// 	/**
// 	 * @return string
// 	 */
// 	public function getClassName() {
// 		// TODO: Auto-generated method stub
// 		return $this->doctrineRepository->getClassName();
// 	}
	
	
	
// 	public function getDoctrineRepository() {
// 		return $this->doctrineRepository;
// 	}
// 	public function setDoctrineRepository(EntityRepository $doctrineRepository) {
// 		$this->doctrineRepository = $doctrineRepository;
// 		return $this;
// 	}
// 	public function getIsReadOnly() {
// 		return $this->isReadOnly;
// 	}
	

	
// }