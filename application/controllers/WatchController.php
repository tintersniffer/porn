<?php

use My\Factory\MyEntityManagerFactory;
use Models\Services\VideoService;
use Doctrine\Common\Collections\ArrayCollection;
class WatchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        /* @var $repo \Models\Repositories\MovieRepository */
        $repo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
        $this->view->movie = $repo->find($this->getParam('id'));
        if($this->view->movie){
        	VideoService::getInstance()->viewMovie($this->getParam('id'));
        	$this->view->relatedMovies = $repo->__findRandomRelatedMovies($this->getParam('id'));
        }
        $repo->clear();
    }


}

