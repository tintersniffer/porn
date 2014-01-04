<?php
namespace My\Generator;

class StringGenerator{	
	public static function createRandomString($length){
		return substr(base64_encode(mt_rand()), 0, $length);
	}
}