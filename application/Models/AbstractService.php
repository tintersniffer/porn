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
abstract class AbstractService{
	
	
	
	protected  function __construct(){
	}
	
	/**
	 * 
	 * @var AbstractRepository
	 */
	protected static $instance;
	
	
	private static $autowiredFlag = true;

	
	private static final function autowired(){
		/* @var $jp \My\Illusion\AopJoinpoint */
		
		if(self::$autowiredFlag){			
			$em = MyEntityManagerFactory::getEntityManager();
			$before = function($jp) use($em){
				
// 				\Zend_Debug::dump($jp->getClassName());
				
				$reflection = new \ReflectionClass($jp->getClassName());
				$params = $reflection->getConstructor()->getParameters();
				
				$args = $jp->getArguments();
				
				foreach ($params AS $key=>$param) {
					if($param->getClass()){
						$entityName = '\\'. str_replace(array('Repositories','Repository'), array('Entities',''), $param->getClass()->name);
						$args[$key] = $em->getRepository($entityName);
					}					
				}
				
// 				\Zend_Debug::dump($args);
				$jp->setArguments($args);
			};			
		
			$namespace='Models\Services\*Service->__construct*()';
			aop_add_before($namespace , $before);
		
			self::$autowiredFlag = false;
		}
	}
	
	
    protected static function getInstance()
    {
        $class = get_called_class();
        if(!static::$instance)
        	//initiate aop
        	self::autowired();
        	//end initiate aop
            static::$instance = new $class();

        return static::$instance;
    }	
	
}