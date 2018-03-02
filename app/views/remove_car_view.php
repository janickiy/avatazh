<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

if (Core_Array::getRequest('car_id')) {
    $data->removeCar(Core_Array::getRequest('car_id'));
    header("Location: ./?t=cars");
    exit();
}