<?php
namespace My\Factory;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\SimpleAnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use My\Monitor\MySQLLogger;
use My\Configs\MyDatabaseConfiguration;
use My\Utils\MyCache;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\Common\Proxy\AbstractProxyFactory;

class MyEntityManagerFactory{
	
	public static $isUpdateSchema = false;
	
	/**
	 * 
	 * @var EntityManager
	 */
	private static $em=null;
	
	/**
	 * 
	 * @return \Doctrine\ORM\EntityManager
	 */
	public static function getEntityManager(){			
		if(null === static::$em){
			$cache = MyCache::getInstance();
			self::$em = self::createNewEntityManager();
			
			if(static::$isUpdateSchema){
// 				$schemaTool = new SchemaTool(self::$em);
				$classes = self::$em->getMetadataFactory()->getAllMetadata();
// 				$schemaTool->dropSchema($classes);
// 				$schemaTool->createSchema($classes);	
// 				$schemaTool->updateSchema($classes);				
			}
			
			
			/**
				flush update before shutdown
			 */
			$beforeShutdownFunction = function(){
				$em = MyEntityManagerFactory::getEntityManager();
				while(true){
					try{
						$con = $em->getConnection();
						if($con->isTransactionActive()){
							$em->flush();
							$con->commit();
						}else{
							break;
						}						
					}catch(\Exception $e){
						break;
					}
				}
				
 			};
 			register_shutdown_function($beforeShutdownFunction);
			
 			self::$em->getConnection()->connect();
		}
		return self::$em;
	}
	
	private static function createNewEntityManager(){
		$config = new Configuration();	
		
		
		$driverImpl = $config->newDefaultAnnotationDriver(APPLICATION_PATH.'/Models/Entities');
		
		$config->setMetadataDriverImpl($driverImpl);
		
// 		$config->setMetadataCacheImpl(MyCache::getInstance("_doctrine_metadata")->getCacheImplement());
// 		$config->setQueryCacheImpl(MyCache::getInstance("_doctrine_query_cache")->getCacheImplement());
// 		$config->setResultCacheImpl(MyCache::getInstance("_doctrine_result_cache")->getCacheImplement());
// 		$config->setHydrationCacheImpl(MyCache::getInstance("_doctrine_hydration_cache")->getCacheImplement());
		$config->setMetadataCacheImpl(MyCache::getInstance("_doctrine_cache")->getCacheImplement());
		$config->setQueryCacheImpl(MyCache::getInstance("_doctrine_cache")->getCacheImplement());
		$config->setResultCacheImpl(MyCache::getInstance("_doctrine_cache")->getCacheImplement());
		$config->setHydrationCacheImpl(MyCache::getInstance("_doctrine_cache")->getCacheImplement());
		
		$config->setProxyDir(APPLICATION_PATH.'/Models/Proxies/__CG__/');
// 		$config->setProxyDir(APPLICATION_PATH.'/Models/Proxies/__CG__/Models/Entities2');		
		$config->setAutoGenerateProxyClasses(AbstractProxyFactory::AUTOGENERATE_FILE_NOT_EXISTS);
		$config->setProxyNamespace('Models\\Proxies\\');			
		
// 		\My\Doc	
		$config->addCustomNumericFunction('RAND', 'My\Doctrine\DqlFunction\Rand');
		
		
// 		$config->setSQLLogger(new MySQLLogger());
			
		$connectionParams = MyDatabaseConfiguration::getConnectionParam();		
		$conn = DriverManager::getConnection($connectionParams);
		
		return EntityManager::create($conn, $config);
	}
}
