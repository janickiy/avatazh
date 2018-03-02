<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_remove_url_price extends Controller
{
	function __construct()
	{
		$this->model = new Model_remove_url_price();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('remove_url_price_view.php', $this->model);
	}
}