<?php
namespace My\Configs;
use My\Services\MyCache;
class MyRouterConfiguration{
	public static function getRouter(){
		/* @var $router Zend_Controller_Router_Rewrite */	
		$router = null;
		$cache = MyCache::getInstance();
		$id = 'router-config';		
		if($cache->contains($id))
			$router = $cache->fetch($id);
		else{
			$router =  new \Zend_Controller_Router_Rewrite();
			$cache->save($id, $router);
		}
		
		$routes = array();
		$routes['watch'] = new \Zend_Controller_Router_Route('watch/:videoKey', array('controller'=>'video', 'action'=>'watch', 'videoKey'=>"none"));
		$routes['source'] = new \Zend_Controller_Router_Route('get/:videoKey', array('controller'=>'video', 'action'=>'get', 'videoKey'=>"none"));
		
		$router->addRoutes($routes);
		return $router;
	}
}