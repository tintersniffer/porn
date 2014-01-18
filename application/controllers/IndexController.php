<?php

use My\Factory\MyEntityManagerFactory;
use Models\Repositories\MovieRepository;
use My\Manager\TransactionManager;
use Models\Services\BackendManagementService;
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
//     	$repo = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\File");    
//     	$repo->findAll();
    	
//     	$bmService = BackendManagementService::getInstance();

    	$repo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
    	$this->view->movies = $repo->findBy(array('isActive'=>true),array('id'=>'desc'));
    }
    
    public function testAction(){
    	throw new Exception();
    }
    


}

