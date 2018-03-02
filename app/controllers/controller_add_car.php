<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_add_car extends Controller
{
	function __construct()
	{
		$this->model = new Model_add_car();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('add_car_view.php',$this->model);
	}
}