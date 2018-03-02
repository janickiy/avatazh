<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_price extends Controller
{
	function __construct()
	{
		$this->model = new Model_price();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('price_view.php',$this->model);
	}
}