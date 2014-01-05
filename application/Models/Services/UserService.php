<?php

namespace Models\Services;

use Models\AbstractService;
use Models\Repositories\UserRepository;
class UserService extends AbstractService{
	
	/**
	 * 
	 * @var UserRepository
	 */
	public $userRepository;
	
	
	protected function __construct(UserRepository $userRepository = null) {
		\Zend_Debug::dump($userRepository);
		$this->userRepository = $userRepository;
	}
	
	
	/**
	 * @return UserService
	 */
	public static function getInstance() {
		return parent::getInstance();
	}


	
}