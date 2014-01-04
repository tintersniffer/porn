<?php
namespace My\Plugin;
use My\Services\MyURLService;
use My\Manager\MyLayoutManager;
use My\Factory\MySessionFactory;
use Models\Services\UserService;
use Models\Services\CategoryService;
use Models\DataModels\SessionDataModel;
use Models\Services\CompetitorService;
use Models\Services\ClubService;
//require_once 'Zend/Controller/Plugin/Abstract.php';

class MyPlugin extends \Zend_Controller_Plugin_Abstract
{
	
	private static $instance;	
	private function __construct(){
	}
	public static function getInstance(){
		
		if(! isset(static::$instance)){
			static::$instance = new static;
		}
		/* @var $instance \My_Plugin_Plugin */
		$instance = static::$instance;
		return $instance;
	}

	public function routeStartup(\Zend_Controller_Request_Abstract $request)
	{		
		
	}

	public function preDispatch(\Zend_Controller_Request_Abstract $request)
	{	
		\Zend_Controller_Front::getInstance()->getResponse()->clearBody();
	}

	public function postDispatch(\Zend_Controller_Request_Abstract $request)
	{	
		
	}	
	
	public function dispatchLoopShutdown() {
		$content = $this->getResponse()->getBody();
		$this->getResponse()->clearBody();
		$this->getResponse()->appendBody(MyLayoutManager::getInstance()->render($content));
	}
}