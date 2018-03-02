<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_remove_car extends Controller
{
	function __construct()
	{
		$this->model = new Model_remove_car();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('remove_car_view.php', $this->model);
	}
}