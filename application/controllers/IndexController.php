<?php

use My\Factory\MyEntityManagerFactory;
use Models\Repositories\MovieRepository;
use My\Manager\TransactionManager;
use Models\Services\BackendManagementService;
use Models\Services\VideoService;
use Helper\Html\Navigation\BootstrapPageNavigationHelper;

class IndexController extends Zend_Controller_Action
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
    	$this->view->movies = $repo->__findByPageNavigation($page);
    	
    	$currentPage = $page;
    	$maxPage = $repo->__findMaxPageNavigation();
    	$baseNavigationUrl= Zend_Controller_Front::getInstance()->getBaseUrl().'/latest-update';
    	$navigationParameterPrefix = "/";
		$this->view->navigation = new BootstrapPageNavigationHelper($currentPage, $maxPage, $baseNavigationUrl, $navigationParameterPrefix);
    	
    }
    
    public function testAction(){
    	throw new Exception();
    }
    
    
    


}

