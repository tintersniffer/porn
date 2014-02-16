<?php
namespace My\Utils;
use Doctrine\Common\Cache\ApcCache;
use Doctrine\Common\Cache\MemcacheCache;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\XcacheCache;
use Doctrine\Common\Cache\Cache;
use My\Configs\MyMemcacheConfig;
use Doctrine\Common\Cache\CacheProvider;


class MyCache implements Cache {
	
	private static $TYPE_PREFER_DEFAULT = 4; // 0 mean don't use this prefer
	private static $TYPE_DEFAULT = 1;
	public static $TYPE_ARRAY = 1;
	public static $TYPE_APC = 2;
	public static $TYPE_MEMCACHE = 3;
	public static $TYPE_XCACHE = 4;
	private static $_TYPE;

	
	public static $namespacePrefix = "";
	
	protected static $_instances = array();


	/**
	 * Doctrine Cache Provider
	 * @var CacheProvider
	 */
	private $_cacheImplement;

	/** @param $strategy null|integer */
	public static function setType($type) {		
		static::$_TYPE = $type;
	}
	
	
	
	
	private function init($namespace) {
		$prefix = self::$namespacePrefix;
		$namespace = "{$prefix}:{$namespace}";
		
		$type = 0;
		if (static::$TYPE_PREFER_DEFAULT == 0) {
			if (isset(static::$_TYPE))
				$type = static::$_TYPE;
			else
				$type = static::$TYPE_DEFAULT;
		} else {
			$type = static::$TYPE_PREFER_DEFAULT;
		}

		if ($type == static::$TYPE_APC) {
			$this->_cacheImplement = new ApcCache();
		} else if ($type == static::$TYPE_MEMCACHE) {
			$m = new MemcacheCache();
			$memcache = new \Memcache;
			$memcache->connect('localhost', 11211);
			$m->setMemcache($memcache);
			$this->_cacheImplement = $m;
		} else if ($type == static::$TYPE_XCACHE) {
			$this->_cacheImplement = new XcacheCache();
		} else {
			$this->_cacheImplement = new ArrayCache();
		}
		$this->_cacheImplement->setNamespace($namespace);
	}
	
	

	/**
	 * 
	 * @param string $namespace
	 * @return MyCache
	 */
	public static function getInstance($namespace="_default") {
		if (! isset ( static::$_instances [$namespace] )) {
			static::$_instances [$namespace] = new static ();
			static::$_instances [$namespace]->init ($namespace);
		}
		return static::$_instances [$namespace];
	}
	
	
	
	public function getCacheImplement() {
		return $this->_cacheImplement;
	}
	
	
	public function fetch($id) {
		return $this->_cacheImplement->fetch ( $id );
	}
	public function contains($id) {
		return $this->_cacheImplement->contains ( $id );
	}
	public function save($id, $data, $lifeTime = 0) {
		return $this->_cacheImplement->save ( $id, $data, $lifeTime );
	}
	public function delete($id) {
		return $this->_cacheImplement->delete ( $id );
	}
	public function getStats() {
		return $this->_cacheImplement->getStats ();
	}	
	
	
	
	protected function __construct() {}
	protected function __clone() {}

}
