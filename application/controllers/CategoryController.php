<?php

use My\Factory\MyEntityManagerFactory;
use Helper\Html\Navigation\BootstrapPageNavigationHelper;
class CategoryController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        /*@var $repo \Models\Repositories\MovieRepository */
    	$repo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
    	
    	$page = intval($this->getParam('page'));
    	$page = $page>0? $page : 1;
    	$categoryId = intval($this->getParam('categoryId'));
    	$categoryId = $categoryId>0? $categoryId:0;    	
    	
    	$this->view->movies = $repo->__findByPageNavigationWithCategory($page, $categoryId);
    	
    	$currentPage = $page;
    	$maxPage = $repo->__findMaxPageNavigationWithCategory($categoryId);
    	$baseNavigationUrl= Zend_Controller_Front::getInstance()->getBaseUrl()."/category/{$categoryId}";
    	$navigationParameterPrefix = "/";
		$this->view->navigation = new BootstrapPageNavigationHelper($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix);
    }


}

