<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
Auth::logOut();

header("Location: ./");

exit();