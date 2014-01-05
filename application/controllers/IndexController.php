<?php

use My\Factory\MyEntityManagerFactory;
use Models\Repositories\MovieRepository;
use Models\Entities\User;
use My\Manager\TransactionManager;
use Models\Services\UserService;
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
    	$repo = MyEntityManagerFactory::getEntityManager()->getRepository("Models\Entities\User");
    	    	
    	$user1 = new User();
    	$user1->setUsername("map1");
    	$repo->save($user1, true);
    	
    	Zend_Debug::dump($user1);
//     	Die();
    	
//     	$user2 = new User();
//     	$user2->setUsername("map2");
//     	$repo->save($user2);

    	
    	UserService::getInstance()->userRepository->findAll();
    }
    
    public function testAction(){
    	throw new Exception();
    }
    


}

