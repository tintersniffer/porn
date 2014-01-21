<?php
namespace My\Configs;
class MyRouterConfiguration{
	public static function getRouter(){
		/* @var $router Zend_Controller_Router_Rewrite */	
		$router =  new \Zend_Controller_Router_Rewrite();
		
		$routes = array();
		$routes['watch'] = new \Zend_Controller_Router_Route('watch/:id/:name', array('controller'=>'watch', 'action'=>'index', 'id'=>"0", 'name'=>''));
		$routes['category'] = new \Zend_Controller_Router_Route('category/:id/:name', array('controller'=>'category', 'action'=>'index', 'id'=>"0", 'name'=>''));
		
		$router->addRoutes($routes);
		return $router;
	}
}