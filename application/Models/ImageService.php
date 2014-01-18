<?php
namespace Models\Services;

use My\Factory\MyEntityManagerFactory;
use My\Services\MyCache;
use Models\Entities\Image;
use My\Generator\MyKeyGenerator;
use My\Generator\MyStringGenerator;
class ImageService{	

	public static function getProductImages(){
		$em = MyEntityManagerFactory::getEntityManager();
		$className = '\Models\Entities\Image';
		$dql = "select i from \Models\Entities\Image i"
				.' join i.product p'
				.' where p.id is not null';
		$query = $em->createQuery($dql);
		return $query->getResult();
	}
	
		
	public static function getAvailableKey(){
		while(true){
			$length = rand(4, 6);
			$key = MyStringGenerator::createRandomString($length);
			$img = self::getImageByKey($key);
			if($img==null) return $key;
		}		
	}
	
	/**
	 *
	 * @param unknown $id
	 * @return Image
	 */
	public static function getImageById($id){
		$em = MyEntityManagerFactory::getEntityManager();
		$className = '\Models\Entities\Image';
		$dql = "select p from {$className} p where p.id = ?1";
		$query = $em->createQuery($dql);
		$query->setParameter(1, $id);
		return current($query->getResult());
	}	
	
	public static function getImageByKey($key){
		$em = MyEntityManagerFactory::getEntityManager();
		$className = '\Models\Entities\Image';
		$dql = "select p from {$className} p where p.key = ?1";
		$query = $em->createQuery($dql);
		$query->setParameter(1, $key);
		return current($query->getResult());
	}
	
	public static function getImageByMd5($md5){
		$em = MyEntityManagerFactory::getEntityManager();
		$className = '\Models\Entities\Image';
		$dql = "select p from {$className} p where p.md5 = ?1";
		$query = $em->createQuery($dql);
		$query->setParameter(1, $md5);
		return current($query->getResult());
	}
	
	/**
	 * 
	 * @return Image
	 */
	public static function getImageByMd5UploadedByUser($md5, $userId){
		$em = MyEntityManagerFactory::getEntityManager();
		$className = '\Models\Entities\Image';
		$dql = "select distinct p from {$className} p"
				.' left join p.referenceImage r'
				.' join p.uploader pu'
				.' join r.uploader ru'
				.' where (p.md5 = ?1 or r.md5 = ?1) and pu.id = ?2';
		$query = $em->createQuery($dql);
		$query->setParameter(1, $md5);
		$query->setParameter(2, $md5);
		return current($query->getResult());
	}
	
}