<?php
namespace My\Utils;

class MyStringEncryption{
	
	public static function encryptString($string){
		$texteACrypter = $string;
		$clefSecrete = 'FileUploadSystem';
		$method = 'aes-128-cbc';
		$encrypted = @openssl_encrypt($texteACrypter, $method, $clefSecrete);
		return $encrypted;
	}
	public static function decryptString($string){
		$encrypted = $string;
		$method = 'aes-128-cbc';
		$clefSecrete = 'FileUploadSystem';
		$decrypted = @openssl_decrypt($encrypted, $method, $clefSecrete);	
		return $decrypted;	
	}
}