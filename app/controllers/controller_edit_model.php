<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_edit_model extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit_model();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('edit_model_view.php',$this->model);
	}
}