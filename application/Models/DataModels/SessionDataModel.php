<?php

namespace Models\DataModels;
use Models\Entities\User;
use My\Factory\MyEntityManagerFactory;
class SessionDataModel{
	
	/**
	 * 
	 * @var User
	 */
	private $myUser=null;
		
	/**
	 * 
	 * @return User
	 */
	public function getMyUser() {
		if($this->myUser==null){
			$userId = $this->_getMyUserId();
			if(empty($userId)){
				return null;
			}			
			$userRepository = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\User');
			$this->myUser = $userRepository->find($userId);
		}
		return $this->user;
	}
	public function setMyUser(User $myUser) {
		$this->myUser = $myUser;
		$this->_setMyUserId($myUser->getId());
		return $this;
	}
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	private static $instance;	
	/**
	 * @return SessionDataModel
	 */
	public static  function getInstance(){
		if(self::$instance===null){
			self::$instance = new SessionDataModel();				
		}
		return self::$instance;
	}
	/**
	 * 
	 * @var \Zend_Session_Namespace
	 */
	private $_session;
	private function __construct(){
		\Zend_Session::start();
		$this->_session = new \Zend_Session_Namespace();
		$this->_session->setExpirationSeconds(1200);
	}
	
	
	
	private function _getMyUserId(){
		return $this->session->myUserId;
	}
	private function _setMyUserId($id){
		$this->session->myUserId = $id;
	}
	
	
	
}