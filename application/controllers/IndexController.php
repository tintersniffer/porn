<?php

use My\Factory\MyEntityManagerFactory;
class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        MyEntityManagerFactory::getEntityManager();
    }


}

