<?php
namespace My\Factory;
class MySessionFactory{
	
	private static $_instances = array();
	
	public static function getSessionNamespace($namespace=null){
		$namespace = empty($namespace)? 'Default':$namespace;
		if( !(isset(self::$_instances[$namespace]) && self::$_instances[$namespace] instanceof \Zend_Session_Abstract )){
			self::$_instances[$namespace] = new \Zend_Session_Namespace($namespace);
		}		
		/* @var $session \Zend_Session_Namespace */
		$session = self::$_instances[$namespace];
		return $session;
	}
}