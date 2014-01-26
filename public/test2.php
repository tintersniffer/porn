<?php
$MAX_CAP = 3000;


defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('PUBLIC_PATH')
|| define('PUBLIC_PATH', realpath(dirname(__FILE__)));

// // Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
realpath(APPLICATION_PATH.'/../library'),realpath(APPLICATION_PATH),
get_include_path(), realpath(PUBLIC_PATH)
)));

//error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
// create autoloader
require_once 'Zend/Loader/Autoloader.php';
$loader = \Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('My\\');
$loader->registerNamespace("Doctrine\\");
$loader->registerNamespace("Models\\");





$sourceUrl = 'https://plus.google.com/photos/106135027719844357910/albums/5970312833136615089/5970595871311426930?pid=5970595871311426930&oid=106135027719844357910';
preg_match('/photos\/([0-9]+)\//', $sourceUrl, $matches);
$id = $matches[1];
preg_match('/pid=([0-9]+)/', $sourceUrl, $matches);
$pid = $matches[1];

Zend_Debug::dump($matches);

$ch = curl_init($sourceUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: graph.facebook.com'));
$output = curl_exec($ch);


curl_close($ch); 

$pattern = "/,\"\",\"5970595871311426930\",\\[\\][^<>]{{$MAX_CAP}}/s";
echo $pattern;
preg_match($pattern, $output, $matches);
Zend_Debug::dump($matches);

$output = $matches[0];
$pattern = '/http:\/\/[^"]+/';
preg_match_all($pattern, $output, $matches);

$result= array();

foreach ($matches[0] as $key=>$value){
	$pattern = '/http:\/\/redirector.googlevideo.com\/videoplayback?id=[0-9a-zA-Z]+&itag=([0-9]+)/';
	preg_match($pattern, $value[$key], $ms);
	$url = $ms[0];
	$itag = $ms[1];
	
	if($itag==18){
		$result[360] = $url;
	}else if($itag==22){
		$result[720] = $url;
	}
}

//Zend_Debug::dump($result);



function unescapeUTF8EscapeSeq($str) {
	return preg_replace_callback("/\\\u([0-9a-f]{4})/i",
			create_function('$matches',
					'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');'
			), $str);
}

function get_headers_from_url($url)
{

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_NOBODY, 1);

	$response = curl_exec($ch);
	$info = curl_getinfo($ch);
	$headers = array();

	$header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

	foreach (explode("\r\n", $header_text) as $i => $line)
	if ($i === 0)
		$headers['http_code'] = $line;
	else
	{
		list ($key, $value) = explode(': ', $line);

		$headers[$key] = $value;
	}

	curl_close($ch);
	return $headers;
}
