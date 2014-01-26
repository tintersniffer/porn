<?php
use My\Plugin\MyPlugin;
use My\Configs\MyRouterConfiguration;
use My\Configs\MyDatabaseConfiguration;
use My\Utils\MyCache;
use My\Factory\MyEntityManagerFactory;
use My\Manager\TransactionManager;
use Models\AbstractService;

defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
    
defined('PUBLIC_PATH')
    || define('PUBLIC_PATH', realpath(dirname(__FILE__)));

// // Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
realpath(APPLICATION_PATH.'/../library'),realpath(APPLICATION_PATH),
get_include_path(), realpath(PUBLIC_PATH)
)));

//error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
// create autoloader
require_once 'Zend/Loader/Autoloader.php';
$loader = \Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('My\\');
$loader->registerNamespace("Doctrine\\");
$loader->registerNamespace("Models\\");
//setupAutoload();


/** Zend_Session */
Zend_Session::setOptions(array(
'cookie_lifetime' => 1200,
'gc_maxlifetime'  => 1200));
Zend_Session::start();


/* setup Cache System */
MyEntityManagerFactory::$isUpdateSchema = true;
MyCache::$namespacePrefix = "ns6";

MyCache::setType(MyCache::$TYPE_ARRAY);

/** configure front controller */
$front = Zend_Controller_Front::getInstance()
->registerPlugin(MyPlugin::getInstance())
->setRouter(MyRouterConfiguration::getRouter());
 


MyDatabaseConfiguration::$databaseHost = '127.0.0.1';
MyDatabaseConfiguration::$databaseName = 'swim';
MyDatabaseConfiguration::$databaseUserName = 'root';
MyDatabaseConfiguration::$databasePassword = 'adminadmin';

MyDatabaseConfiguration::$databaseHost = 'localhost'; 
MyDatabaseConfiguration::$databaseName = 'mapz_porn';
MyDatabaseConfiguration::$databaseUserName = 'mapz_dev';
MyDatabaseConfiguration::$databasePassword = 'adminP@12w0rd';

TransactionManager::start();

//$application->bootstrap()->run();

$front->addControllerDirectory(APPLICATION_PATH.'/controllers');
$front->throwExceptions(true);
try {
	$front->dispatch();
} catch(Exception $e) {
	echo nl2br($e->__toString());
}
