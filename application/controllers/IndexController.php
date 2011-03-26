<?php

class IndexController extends Zend_Controller_Action
{

    public function indexAction()
	{
		require_once 'forms/Search.php';
		$this->_form = new Application_Form_Search();
		$this->view->form = $this->_form;
		
		if ($this->getRequest()->isPost()) {

			// now check to see if the form submitted exists, and
			// if the values passed in are valid for this form
			if ($this->_form->isValid($this->_request->getPost())) {
				// Get the values from the DB
				$data = $this->_form->getValues();
				
				//replace spaces inside location with +
				$data['searchphrase'] = str_replace(' ', '+',$data['searchphrase']);
				
			}
		}
	}


}

