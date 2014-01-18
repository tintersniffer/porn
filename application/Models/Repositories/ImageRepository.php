<?php

namespace Models\Repositories;

use Models\AbstractRepository;
use My\Generator\MyStringGenerator;
use Models\Entities\Image;
use Doctrine\Common\Collections\ArrayCollection;

class FileRepository extends AbstractRepository{
	
	/**
	 * 
	 * @param string $paramName
	 * @return \Models\Entities\Image
	 */
	public function saveImage($paramName='file'){
		
		$time = new \DateTime();
		$name = $_FILES [$paramName] ['name'];
		$name2 = strtolower ( $name );
		$type = $_FILES [$paramName] ['type'];
		$tmp = $_FILES [$paramName] ['tmp_name'];
		$error = $_FILES [$paramName] ['error'];
		$size = $_FILES [$paramName] ['size'];
		$md5 = md5_file ( $tmp );
		
		
		$image = new Image ();
		
		$md5Check = $this->findBy(array('md5'=>$md5));
		if (empty ( $md5Check )) {
			$image->setMd5 ( $md5 );
			$image->setSizeKb ( floatval ( $size / 1024 ) );
			$image->setKey ( $this->getAvailableKey() );
			move_uploaded_file ( $tmp, realpath ( PUBLIC_PATH . '/uploaded-images' ) . '/' . $image->getKey () );
		} else {
			$image->setReferenceImage ( $md5Check );
		}
		$image->setName ( basename ( $name ) );
		$image->setUploadedTime ( $time );
		
		$this->save($image);
		return $image;
	}
	
	/**
	 * 
	 * @param string $paramName
	 * @return ArrayCollection
	 */
	public function saveMultipleImages($paramName='files'){
		$time = new \DateTime();
		$list = new ArrayCollection();
		
		foreach ($_FILES[$paramName]['name'] as $i=>$v){
			
			$name = $_FILES [$paramName] ['name'][$i];
			$name2 = strtolower ( $name );
			$type = $_FILES [$paramName] ['type'][$i];
			$tmp = $_FILES [$paramName] ['tmp_name'][$i];
			$error = $_FILES [$paramName] ['error'][$i];
			$size = $_FILES [$paramName] ['size'][$i];
			$md5 = md5_file ( $tmp );
			
			
			$image = new Image ();
			
			$md5Check = $this->findBy(array('md5'=>$md5));
			if (empty ( $md5Check )) {
				$image->setMd5 ( $md5 );
				$image->setSizeKb ( floatval ( $size / 1024 ) );
				$image->setKey ( $this->getAvailableKey() );
				move_uploaded_file ( $tmp, realpath ( PUBLIC_PATH . '/uploaded-images' ) . '/' . $image->getKey () );
			} else {
				$image->setReferenceImage ( $md5Check );
			}
			$image->setName ( basename ( $name ) );
			$image->setUploadedTime ( $time );
			
			$this->save($image);
			$list->add($image);
		}	
		
		return $list;
		
	}
	
	private function getAvailableKey(){
		while(true){
			$length = rand(4, 6);
			$key = MyStringGenerator::createRandomString($length);
			$img = $this->findOneBy(array('key'=>$key));			
			if($img==null) return $key;
		}
	
	}
}