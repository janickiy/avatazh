<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_edit_shop extends Controller
{
	function __construct()
	{
		$this->model = new Model_edit_shop();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('edit_shop_view.php',$this->model);
	}
}