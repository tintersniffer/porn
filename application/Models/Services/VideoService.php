<?php
namespace Models\Services;

use Models\Repositories\MovieRepository;
use My\Factory\MyEntityManagerFactory;
class VideoService{
	private $_maxCap = 3000;
	
// 	protected function __construct();
	protected static $instance = null;
	
	
	/**
	 * 
	 * @var MovieRepository
	 */
	protected $_movieRepository;
	
	protected function __construct(){
		$em = MyEntityManagerFactory::getEntityManager();
		$this->_movieRepository = $em->getRepository('\Models\Entities\Movie');
	}
	
	
	/**
	 * @return VideoService
	 */
	public static function getInstance()
    {
        if (!isset(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    
	public function getRealVideo($url){
		$sourceUrl = $url;
		
		preg_match('/photos\\/([0-9]+)\\/albums\\/[0-9]+\\/([0-9]+)/', $sourceUrl, $matches);
		$id = $matches[1];
// 		preg_match('/pid=([0-9]+)/', $sourceUrl, $matches);
// 		$pid = $matches[1];
		$pid = $matches[2];
		
		
		
		$ch = curl_init($sourceUrl);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		// curl_setopt($ch, CURLOPT_HTTPHEADER, array('Host: graph.facebook.com'));
		$output = curl_exec($ch);
		curl_close($ch);		
		
		$pattern = "/,\"\",\"5970595871311426930\",\\[\\][^<>]{{$this->_maxCap}}/s";
		preg_match($pattern, $output, $matches);
		
		$output = $matches[0];
		$pattern = '/http:\/\/[^"]+/';
		preg_match_all($pattern, $output, $matches);
		
		
		$result = array();
		foreach ($matches[0] as $key=>$value){
			$value = $this->_unescapeUTF8EscapeSeq($value);
			$value = $this->_getRealUrl($value);
// 			\Zend_Debug::dump($url);
			$pattern = '/http:\/\/[a-zA-Z0-9-]+.googlevideo.com\/videoplayback\?id=[0-9a-zA-Z]+&itag=([0-9]+)/';
			preg_match($pattern, $value, $ms);
// 			\Zend_Debug::dump($ms);
			$url = $value;
			$itag = $ms[1];
		
			if($itag==18 && !isset($result[360])){				
				$result[360] = $url;
			}else if($itag==22 && !isset($result[720])){
				$result[720] = $url;
			}	
			
		}
		\Zend_Debug::dump($result);
		return $result;		
	}
	
	
	private function _unescapeUTF8EscapeSeq($str) {
		return preg_replace_callback("/\\\u([0-9a-f]{4})/i",
				create_function('$matches',
					'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');'
				), $str);
	}
	
	private function _getRealUrl($sourceUrl){
		$headers = $this->_getHeadersFromUrl($sourceUrl);
		if(isset($headers['Location'])){
			return $this->_getRealUrl($headers['Location']);
		}		
		return $sourceUrl;
	}
	
	private function _getHeadersFromUrl($url)
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
	
}

