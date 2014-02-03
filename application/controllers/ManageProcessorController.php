<?php

use My\Factory\MyEntityManagerFactory;
use My\Manager\MyLayoutManager;
use Models\DataModels\SessionDataModel;
use Models\Entities\Movie;
use Models\Entities\Category;
class ManageProcessorController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
		MyLayoutManager::getInstance()->setLayoutFileName("backend.phtml");
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
	
// 	public function addNewServerAction()
// 	{
// 		// action body
// 		$server = new Server();
// 		$serverRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Server');
// 		$server->setUrl($this->getRequest()->getPost('url'));
// 		$server->setProtocal($this->getRequest()->getPost('protocal'));
// 		//$server->setUrl($this->getRequest()->getPost('protocal').$this->getRequest()->getPost('url'));
// 		$server->setTriggerUrl($this->getRequest()->getPost('protocal').$this->getRequest()->getPost('url'));
// 		$currentDate = new DateTime();
// 		$server->setCreatedDate($currentDate);
// 		$server->setIsActive(true);
// 		$url = $this->getRequest()->getPost('url');
// 		if(!empty($url)){
// 			$serverRepo->save($server);
// 		}
// 		Zend_Debug::dump($server);
// 		//Die();
// 		$url = '/manage/servers';
// 		$this->redirect($url);
// 		//$this->forward("servers","manage");
// 	}
	
	public function addNewTypeAction()
	{
		// action body
		$type = new Category();
		$typeRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Category');
// 		$type->setTypeName($this->getRequest()->getPost('type'));
		$type->setName($this->getRequest()->getPost('type'));
		$type->setDescription($this->getRequest()->getPost('description'));
		$type->setSortingOrder($this->getRequest()->getPost('sortingOrder'));
		$currentDate = new DateTime();
		$type->setCreatedDate($currentDate);
		$type->setIsActive(true);
		$typeRepo->save($type);
		Zend_Debug::dump($type);
// 		Die();
		$url = '/manage/types';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	
	public function updateTypeAction()
	{
		// action body
		$id = $this->getRequest()->getPost('id');
		$type = MyEntityManagerFactory::getEntityManager()->getRepository("\\Models\\Entities\\Category")->find($id);
		$type->setName($this->getRequest()->getPost('type'));
		$type->setDescription($this->getRequest()->getPost('description'));
		$type->setSortingOrder($this->getRequest()->getPost('sortingOrder'));
		$currentDate = new DateTime();
		$type->setUpdatedDate($currentDate);
		Zend_Debug::dump($type);
		$url = '/manage/types';
		$this->redirect($url);
	}
	
	public function deleteTypeAction()
	{
		// action body
		$id = $this->getRequest()->getParam('id');
		$type = MyEntityManagerFactory::getEntityManager()->getRepository("\\Models\\Entities\\Category")->find($id);
		$type->setIsActive(false);
		$currentDate = new DateTime();
		$type->setUpdatedDate($currentDate);
		Zend_Debug::dump($type);
		$url = '/manage/types';
		$this->redirect($url);
	}
	
	public function restoreTypeAction()
	{
		// action body
		$id = $this->getRequest()->getParam('id');
		$type = MyEntityManagerFactory::getEntityManager()->getRepository("\\Models\\Entities\\Category")->find($id);
		$type->setIsActive(true);
		$currentDate = new DateTime();
		$type->setUpdatedDate($currentDate);
		Zend_Debug::dump($type);
		$url = '/manage/types';
		$this->redirect($url);
	}
	
	public function addNewMovieAction()
	{
		// action body
		$movie = new Movie();
		$movieRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
		//$type->setTypeName($this->getRequest()->getPost('type'));
		$movie->setMovieName($this->getRequest()->getPost('movieName'));
		$movie->setFriendlyName($this->getRequest()->getPost('friendlyName'));
		$movie->setDescription($this->getRequest()->getPost('description'));
		$category =  MyEntityManagerFactory::getEntityManager()->getRepository('\\Models\\Entities\\Category')->find($this->getRequest()->getPost('category'));
		$movie->setCategory($category);
		$realUrl = $this->getRequest()->getPost('realUrl');
// 		$vs = VideoService::getInstance();
// 		$vids = $vs->getRealVideo($realUrl);
		$movie->setRealUrl($realUrl);
// 		$movie->setProcessedUrl(serialize($vids));
		
		$currentDate = new DateTime();
		$movie->setCreatedDate($currentDate);
		$movie->setUpdatedDate($currentDate);
		$movie->setIsActive(true);

		$movie->setCoverUrl($this->getRequest()->getPost('cover'));
		$movie->setScreenShotUrl($this->getRequest()->getPost('screenShot'));
		$movieRepo->save($movie);
		
		
		$url = '/manage/movies';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	
	public function updateMovieAction()
	{
		// action body
		$id = $this->getRequest()->getPost('id');
		$movie = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Movie")->find($id);
		$movieRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
		//$type->setTypeName($this->getRequest()->getPost('type'));
		$movie->setMovieName($this->getRequest()->getPost('movieName'));
		$movie->setFriendlyName($this->getRequest()->getPost('friendlyName'));
		$movie->setDescription($this->getRequest()->getPost('description'));
		$category =  MyEntityManagerFactory::getEntityManager()->getRepository('\\Models\\Entities\\Category')->find($this->getRequest()->getPost('category'));
		$movie->setCategory($category);
		$realUrl = $this->getRequest()->getPost('realUrl');
// 		$vs = VideoService::getInstance();
// 		$vids = $vs->getRealVideo($realUrl);
		$movie->setRealUrl($realUrl);
// 		$movie->setProcessedUrl(serialize($vids));
		
		
		$currentDate = new DateTime();
		$movie->setUpdatedDate($currentDate);
		$movie->setIsActive(true);
		$movie->setCoverUrl($this->getRequest()->getPost('cover'));
		$movie->setScreenShotUrl($this->getRequest()->getPost('screenShot'));
		//Die();
		$url = '/manage/movies';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	
	public function deleteImageAction(){
		$id = $this->getRequest()->getParam('id');
		$imgId = $this->getRequest()->getParam('imgId');
		$image = MyEntityManagerFactory::getEntityManager()->getRepository('\\Models\\Entities\\Image')->find($imgId);
		$image->setMovie(null);

		$url = '/manage/update-movie?id='.$id;
		$this->redirect($url);
	}

	public function deleteMovieAction()
	{
		// action body
		$id = $this->getRequest()->getParam('id');
		$movie = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Movie")->find($id);
		$movieRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
		$currentDate = new DateTime();
		$movie->setUpdatedDate($currentDate);
		$movie->setIsActive(false);
		Zend_Debug::dump($movie);
		//Die();
		$url = '/manage/movies';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	public function restoreMovieAction()
	{
		// action body
		$id = $this->getRequest()->getParam('id');
		$movie = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Movie")->find($id);
		$movieRepo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
		$currentDate = new DateTime();
		$movie->setUpdatedDate($currentDate);
		$movie->setIsActive(true);
		Zend_Debug::dump($movie);
		//Die();
		$url = '/manage/movies';
		$this->redirect($url);
		//$this->forward("servers","manage");
	}
	
// 	public function updateServerAction()
// 	{
// 		// action body
// 		$id = $this->getRequest()->getPost('id');
// 		$server = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Server")->find($id);
// 		$server->setUrl($this->getRequest()->getPost('url'));
// 		$server->setProtocal($this->getRequest()->getPost('protocal'));
// 		$server->setTriggerUrl($this->getRequest()->getPost('protocal').$this->getRequest()->getPost('url'));
// 		$currentDate = new DateTime();
// 		$server->setUpdatedDate($currentDate);
// 		Zend_Debug::dump($server);
// 		$url = '/manage/servers';
// 		$this->redirect($url);
// 	}
	
// 	public function deleteServerAction()
// 	{
// 		// action body
// 		$id = $this->getRequest()->getParam('id');
// 		$server = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Server")->find($id);
// 		$server->setIsActive(false);
// 		$currentDate = new DateTime();
// 		$server->setUpdatedDate($currentDate);
// 		Zend_Debug::dump($server);
// 		$url = '/manage/servers';
// 		$this->redirect($url);
// 	}
	
	
	
	public function restoreServerAction()
	{
		// action body
		$id = $this->getRequest()->getParam('id');
		$server = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\Server")->find($id);
		$server->setIsActive(true);
		$currentDate = new DateTime();
		$server->setUpdatedDate($currentDate);
		Zend_Debug::dump($server);
		$url = '/manage/servers';
		$this->redirect($url);
	}

	
	public function uploadNewMovieAction(){
		die("444");
	}
	
	public function loginAction(){
		$username = $this->getRequest()->getParam('username');
		$password = md5($this->getRequest()->getParam('password'));
		$user = MyEntityManagerFactory::getEntityManager()->getRepository("\Models\Entities\User")->findOneBy(array('username'=>$username,'password'=>$password));
				
		
		$session = SessionDataModel::getInstance();
		if($user){
			$session->setMyUser($user);
		}
		$url = '/manage/movies';
		$this->redirect($url);
	}
}

