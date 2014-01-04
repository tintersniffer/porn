<?php
namespace My\Configs;
class MyDatabaseConfiguration{
	// Database Configuration Parameter
	public static   $databaseHost = '127.0.0.1';
	public static   $databaseName ='swim';
	public static   $databaseUserName = 'root';
	public static   $databasePassword = 'adminadmin';
	public static   $driver = "pdo_mysql";
	public static   $charset = "utf8";
	
	private static $connectionParam;	
	
	public static function getConnectionParam(){	
			
		 if (isset(self::$connectionParam)) return self::$connectionParam;		 
		 self::$connectionParam = array(
				'dbname' => self::$databaseName,
				'user' => self::$databaseUserName,
				'password' => self::$databasePassword,
				'host' =>  self::$databaseHost,
				'driver' => self::$driver,
				'charset' => self::$charset
		);		 
		return self::$connectionParam;
	}
	
	
	
	private function __construct(){}
	private function __clone(){}
	
}