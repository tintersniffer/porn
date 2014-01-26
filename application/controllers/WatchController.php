<?php

use My\Factory\MyEntityManagerFactory;
class WatchController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $repo = MyEntityManagerFactory::getEntityManager()->getRepository('\Models\Entities\Movie');
        $this->view->movie = $repo->find($this->getParam('id'));
//         Zend_Debug::dump($this->view->movie);
    }


}

