<html>
	<header></header>
	<body>
	
	
<div style="width: 100%; word-wrap: break-word;">

<?php


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



$player1 = 'player';
$player2 = 'player2';
$arrAds = array($player1,$player2);
$rd = rand(0,count($arrAds)-1);
$id = "flashplayer".rand(0,999999999);

$link = 'https://plus.google.com/photos/106135027719844357910/albums/5970312833136615089/5970595871311426930';

include('Gkencode.php');
function gkEncode($link){
	$gkencode = new Gkencode();
	$secretKey = '8U3NjYvvmgPc80kIRAqs';//not change
	return $gkencode->encrypt($link,$secretKey);
}

// echo gkEncode($link);


$isDone = false;
$url = unescapeUTF8EscapeSeq ("http://redirector.googlevideo.com/videoplayback?id\u003ded08610256a25fd1\u0026itag\u003d18\u0026source\u003dpicasa\u0026cmo\u003dsensitive_content%3Dyes\u0026ip\u003d0.0.0.0\u0026ipbits\u003d0\u0026expire\u003d1391355530\u0026sparams\u003did,itag,source,ip,ipbits,expire\u0026signature\u003dB986DB59E643D1C4E1C3DEDCF9BF1FBBE9985084.150A4DC076B477EA3E06975AC0BBE30A856352A3\u0026key\u003dlh1");

while(!$isDone){	
	
	$hd = get_headers_from_url($url);
	Zend_Debug::dump($hd);
	
	if(isset($hd['Location'])){
		$url = $hd['Location'];
	}else{
		$isDone = true;
	}
}

?>


</div>
</body>
</html>








<?php 
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