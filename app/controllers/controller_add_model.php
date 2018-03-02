<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_add_model extends Controller
{
	function __construct()
	{
		$this->model = new Model_add_model();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('add_model_view.php',$this->model);
	}
}