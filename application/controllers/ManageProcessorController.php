<?php

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
	
	public function serverCreateAction()
	{
		// action body
	}
	
	public function serverUpdateAction()
	{
		// action body
	}
	
	public function serverDeleteAction()
	{
		// action body
	}
	
}

