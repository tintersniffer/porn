<?php

use Models\Entities\Server;
use My\Factory\MyEntityManagerFactory;
use My\Manager\MyLayoutManager;
class ManageProcessorController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
		MyLayoutManager::getInstance()->setLayoutFileName("backend.phtml");
	}
	
	public function indexAction()
	{
		// action body
	}
	
	public function movieUpdateAction()
	{
		// action body
	}
	
	public function movieCreateAction()
	{
		// action body
	}
	
	public function movieDeleteAction()
	{
		// action body
	}
	
	public function addNewServerAction()
	{
		// action body
		$server = new Server();
		$serverRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server');
		$server->setUrl($this->getRequest()->getPost('url'));
		$url = $this->getRequest()->getPost('url');
		if(!empty($url)){
			$serverRepo->save($server,true);
		}
		Zend_Debug::dump($server);
		//Die();
		$url = '/manage/servers';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	
	public function updateServerAction()
	{
		// action body
		$id = $this->getRequest()->getPost('id');
		$server = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Server")->find($id);
		$server->setUrl($this->getRequest()->getPost('url'));
		Zend_Debug::dump($server);
		Die();
		$url = '/manage/servers';
		$this->redirect($url);
	}
	
	public function serverDeleteAction()
	{
		// action body
	}
	
}

