<?php
namespace My\Configs;
class MyRouterConfiguration{
	public static function getRouter(){
		/* @var $router Zend_Controller_Router_Rewrite */	
		$router =  new \Zend_Controller_Router_Rewrite();
		
		$routes = array();
		$routes['watch'] = new \Zend_Controller_Router_Route('watch/:videoKey', array('controller'=>'video', 'action'=>'watch', 'videoKey'=>"none"));
		$routes['source'] = new \Zend_Controller_Router_Route('get/:videoKey', array('controller'=>'video', 'action'=>'get', 'videoKey'=>"none"));
		
		$router->addRoutes($routes);
		return $router;
	}
}