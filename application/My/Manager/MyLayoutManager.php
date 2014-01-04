<?php
namespace My\Manager;

use My\Services\MyCache;
class MyLayoutManager {

	private $_defaultTitle = '<title>ยินดีต้อนรับเข้าสู่ Bangkok5 Swim</title>';
	private $_defaultDescription = "";
	private $_defaultKeyword = "";
	private $_defaultRobot = '<meta name="robots" content="index, follow" />';
	private $_enableLayout = true;

	public function disable() {
		$this->_enableLayout = false;
	}

	/**
	 * 
	 * @var MyLayoutManager
	 */
	protected static $_instance = null;
	protected function __construct() {
	}
	protected function __clone() {
	}

	public static function getInstance() {

		if (null === self::$_instance) {
			$id = 'Amazon-Layout-Manager';
			$cache = MyCache::getInstance();
			if ($cache->contains($id)) {
				static::$_instance = $cache->fetch($id);
			} else {
				static::$_instance = new static;
				$baseDir = realpath(APPLICATION_PATH . '/views');
				static::$_instance->_view = new \Zend_View(array('basePath' => $baseDir));
				$cache->save($id, static::$_instance, 3600);
			}

		}
		return static::$_instance;
	}

	/**
	 * 
	 * @var \Zend_View
	 */
	public $_view;
	private $_content;
	private $_layoutFileName = 'default.phtml';
	private $_contentScript = '';
	private $_moveJavascriptToBottom = false;
	public function enableMoveJavaScriptToBottom() {
		$this->_moveJavascriptToBottom = true;
	}
	public function disableMoveJavaScriptToBottom(){
		$this->_moveJavascriptToBottom = false;
	}
	public function setLayoutFileName($fileName) {
		$this->_layoutFileName = $fileName;
		unset($fileName);
	}
	public function render($content) {
		if ($this->_enableLayout) {
			$this->initViewResource();
			$this->_content = $content;
			if ($this->_moveJavascriptToBottom) {
				$pattern = '/<script[^\~]*[\~]?[\r]?[ \t\r\n]*<\/script>/s';
				preg_match_all($pattern, $this->_content, $result);
				$result = $result[0];
				$this->_content = preg_replace($pattern, '', $this->_content);
				foreach ($result as $value) {
					$this->_contentScript .= $value . PHP_EOL;
				}
			}			
			$this->_view->layoutManager = $this;
			return $this->_view->render("_layouts/{$this->_layoutFileName}");
		}else{
			return $content;
		}
	}
	public function getContent() {
		return $this->_content;
	}
	public function getContentScript() {
		return $this->_contentScript;
	}

	private function initViewResource() {
		$this->title = empty($this->title) ? $this->_defaultTitle . PHP_EOL : "<title>{$this->title}</title>" . PHP_EOL;

		$this->description = empty($this->description) ? $this->_defaultDescription . PHP_EOL : "<meta name=\"description\" content=\"{$this->description}\" />" . PHP_EOL;

		$this->keyword = empty($this->keyword) ? $this->_defaultKeyword . PHP_EOL : "<meta name=\"keywords\" content=\"{$this->keyword}\" />" . PHP_EOL;

		$this->robot = empty($this->robot) ? $this->_defaultRobot . PHP_EOL : "<meta name=\"robots\" content=\"{$this->robot}\" />";

		foreach ($this->additionalCss as $value) {
			$this->additionalCssString .= "<link href=\"{$value}\" rel=\"stylesheet\" />" . PHP_EOL;
		}

		foreach ($this->additionalJavascript as $value) {
			$this->additionalJavascriptString .= "<script src=\"{$value}\"></script>" . PHP_EOL;
		}
	}

	private $additionalCss = array();
	private $additionalJavascript = array();
	private $additionalCssString = '';
	private $additionalJavascriptString = '';
	private $additionalHeaderTagString = '';
	
	private $title = null;
	private $description = null;
	private $keyword = null;
	private $robot = null;

	public function registerAdditionalHeaderTag($stringParam){
		$this->additionalHeaderTagString.= PHP_EOL.$stringParam;
	}
	public function registerAdditionalCss($url, $isOnBaseUrl = true) {
		if ($isOnBaseUrl) {
			$baseUrl = \Zend_Controller_Front::getInstance()->getBaseUrl();
			$url = $baseUrl . $url;
		}
		array_push($this->additionalCss, $url);
		return $this;
	}

	public function registerAdditionalJavascript($url, $isOnBaseUrl = true) {
		if ($isOnBaseUrl) {
			$baseUrl = \Zend_Controller_Front::getInstance()->getBaseUrl();
			$url = $baseUrl . $url;
		}
		array_push($this->additionalJavascript, $url);
		return $this;
	}

	public function getTitle() {
		return $this->title;
	}

	public function setTitle($title) {
		$this->title = $title;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getKeyword() {
		return $this->keyword;
	}

	public function setKeyword($keyword) {
		$this->keyword = $keyword;
	}

	public function getRobot() {
		return $this->robot;
	}

	public function setRobot($robot) {
		$this->robot = $robot;
	}

	public function getAdditionalCssString() {
		return $this->additionalCssString;
	}

	public function getAdditionalJavascriptString() {
		return $this->additionalJavascriptString;
	}

	private function setAdditionalCssString($additionalCssString) {
		$this->additionalCssString = $additionalCssString;
	}

	private function setAdditionalJavascriptString($additionalJavascriptString) {
		$this->additionalJavascriptString = $additionalJavascriptString;
	}
	public function getAdditionalHeaderTagString() {
		return $this->additionalHeaderTagString;
	}
	
	
	
}

