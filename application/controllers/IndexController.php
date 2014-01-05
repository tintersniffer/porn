<?php

use My\Factory\MyEntityManagerFactory;
use Models\Repositories\MovieRepository;
use My\Manager\TransactionManager;
use Models\Services\UserService;
use Models\Services\BackendManagementService;
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$repo = MyEntityManagerFactory::getEntityManager()->getRepository("User");    
    	$repo->findAll();
    	
    	$bmService = BackendManagementService::getInstance();
    }
    
    public function testAction(){
    	throw new Exception();
    }
    


}

