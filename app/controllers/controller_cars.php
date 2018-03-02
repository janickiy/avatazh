<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_cars extends Controller
{
	function __construct()
	{
		$this->model = new Model_cars();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('cars_view.php',$this->model);
	}
}