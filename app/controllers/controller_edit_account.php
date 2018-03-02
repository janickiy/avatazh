<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_edit_account extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit_account();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('edit_account_view.php',$this->model);
	}
}