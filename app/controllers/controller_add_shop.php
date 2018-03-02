<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_add_shop extends Controller
{
	function __construct()
	{
		$this->model = new Model_add_shop();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('add_shop_view.php',$this->model);
	}
}