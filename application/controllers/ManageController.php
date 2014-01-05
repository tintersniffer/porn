<?php

use My\Manager\MyLayoutManager;
class ManageController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    	MyLayoutManager::getInstance()->setLayoutFileName("backend.phtml");
    }

    public function indexAction()
    {
        $this->forward('movies');
    }

    public function serversAction()
    {
        // action body
    }

    public function moviesAction()
    {
        // action body
    }

    public function serverDetailAction()
    {
        // action body
    }

    public function movieDetailAction()
    {
        // action body
    }

    public function loginAction()
    {
        // action body
    }


}











