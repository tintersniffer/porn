<?php

namespace Models\Services;

use Models\AbstractService;
use Models\Repositories\FileRepository;
use Models\Repositories\MovieRepository;
use Models\Entities\Server;
use Models\Repositories\ServerRepository;
class BackendManagementService extends AbstractService{
	
	/**
	 * 
	 * @var FileRepository
	 */
	private $fileRepository;	
	
	/**
	 *
	 * @var MovieRepository
	 */
	private $movieRepository;
	
	/**
	 *
	 * @var ServerRepository
	 */
	private $serverRepository;
	
	
	protected function __construct(FileRepository $fileRepository = null, MovieRepository $movieRepository = null) {
		$this->userRepository = $userRepository;
		$this->movieRepository = $movieRepository;
		$this->serverRepository = $serverRepository;
	}
	
	
	/**
	 * @return BackendManagementService
	 */
	public static function getInstance() {
		return parent::getInstance();
	}
	
	

	public function doSomething(){
		$this->serverRepository->findAll();
	}


	
}