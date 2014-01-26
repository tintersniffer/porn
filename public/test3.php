<?php
use Models\Services\VideoService;
defined('APPLICATION_PATH')
|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));

defined('PUBLIC_PATH')
|| define('PUBLIC_PATH', realpath(dirname(__FILE__)));

// // Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
realpath(APPLICATION_PATH.'/../library'),realpath(APPLICATION_PATH),
get_include_path(), realpath(PUBLIC_PATH)
)));

error_reporting(E_ALL);
date_default_timezone_set('Asia/Bangkok');
// create autoloader
require_once 'Zend/Loader/Autoloader.php';
$loader = \Zend_Loader_Autoloader::getInstance();
$loader->registerNamespace('My\\');
$loader->registerNamespace("Doctrine\\");
$loader->registerNamespace("Models\\");


$vs = VideoService::getInstance();
$sourceUrl = 'https://plus.google.com/photos/106135027719844357910/albums/5970312833136615089/5970595871311426930?pid=5970595871311426930&oid=106135027719844357910';
$vs->getRealVideo($sourceUrl);