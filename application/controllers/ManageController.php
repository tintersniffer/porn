<?php

use My\Manager\MyLayoutManager;
use Models\Services\BackendManagementService;
use My\Factory\MyEntityManagerFactory;
use Models\DataModels\SessionDataModel;
class ManageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	$lm = MyLayoutManager::getInstance();
    	$lm->setLayoutFileName("backend.phtml");  	
    	$lm->setTitle('ระบบหลังบ้านจ้า');
    	
		$session = SessionDataModel::getInstance();
    	if($this->getParam('action')!='login')
    	{
    		$user = $session->getMyUser();
    		if($user==null){
    			$url = '/manage/login';
    			$this->redirect($url);
    		}
    	}
    }

    public function indexAction()
    {
        $this->forward('movies');
    }

    public function testAction()
    {
        // action body
//         $this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findAll();
//         $this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findBy(array('isActive'=>true));
    }

    public function serversAction()
    {
        // action body
        $this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findAll();
//         $this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findBy(array('isActive'=>true));
    }

    public function typesAction()
    {
        // action body
        $this->view->types = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Category')->findAll();
//         $this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findBy(array('isActive'=>true));
    }

    public function moviesAction()
    {
        // action body
    	$this->view->movies = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie')->findAll();
   	}

    public function serverDetailAction()
    {
        // ทำอันนี้ก่อน เหมือน data table 
    }

    public function movieDetailAction()
    {
        // action body
        //$this->view->movies = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie')->findAll();
    }

    public function loginAction()
    {
        // action body
    }

    public function addNewServerAction(){
    	
    }

    public function addNewTypeAction(){
    	
    }

    public function addNewMovieAction(){
    	$this->view->categories = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Category')->findBy(array('isActive'=>true));
    	//$this->view->files = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\File')->findAll();
    }

    public function uploadNewMovieAction(){
    	$this->view->servers = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server')->findBy(array('isActive'=>true));
    	
    }

    public function updateServerAction(){
    	$id = $this->getRequest()->getParam("id");
    	$this->view->server = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Server")->find($id);
    }

    public function updateTypeAction(){
    	$id = $this->getRequest()->getParam("id");
    	$this->view->type = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Category")->find($id);
    }

    public function updateMovieAction(){
    	$id = $this->getRequest()->getParam("id");
    	$this->view->movie = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Movie")->find($id);
    	$this->view->categories = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Category')->findBy(array('isActive'=>true));
    }
 
}











