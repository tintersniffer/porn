<?php

use My\Factory\MyEntityManagerFactory;
use Helper\Html\Navigation\BootstrapPageNavigationHelper;
class SearchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $kw = $this->getRequest()->getParam('keyword');        
    	$keywords = preg_split('/[^\w]/',$kw);
    	/* @var $repo \Models\Repositories\MovieRepository */
    	$repo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
    	
    	$page = intval($this->getParam('page'));
    	$page = $page>0? $page : 1;    	
    	
    	$this->view->movies = $repo->__findByPageAndKeywords($page, $keywords);
    	
    	$currentPage = $page;
    	$maxPage = $repo->__findMaxPageNavigationWithKeyword($keywords);
    	$kw = urlencode($kw);
    	
    	$baseNavigationUrl= Zend_Controller_Front::getInstance()->getBaseUrl()."/search?keyword={$kw}";
    	$navigationParameterPrefix = "&page=";
    	$this->view->navigation = new BootstrapPageNavigationHelper($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix);
    }


}

