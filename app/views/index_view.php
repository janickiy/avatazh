<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "index.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Цены');
$tpl->assign('TITLE', 'Цены');


$errors = [];

if (Core_Array::getRequest('action')) {
    if ($data->deleteCars( Core_Array::getRequest('activate'))) {
        $success_msg =  'Выбранные автомобили удалены';
    } else {
        $errors[] = 'Ошибка веб приложения! Действия не были выполнены.';
    }
}

if (!empty($errors)) {
    $errorBlock = $tpl->fetch('show_errors');

    foreach($errors as $row) {
        $rowBlock = $errorBlock->fetch('row');
        $rowBlock->assign('ERROR', $row);
        $errorBlock->assign('row', $rowBlock);
    }

    $tpl->assign('show_errors', $errorBlock);
}

if (isset($success_msg)) {
    $tpl->assign('MSG_ALERT', $success_msg);
}

$city = isset($_COOKIE["city"]) && $_COOKIE["city"] ? $_COOKIE["city"] : 1;
$search = urldecode(Core_Array::getRequest('search'));
$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);
$tpl->assign('CITY', $city);
$tpl->assign('SEARCH', $search);

foreach ($data->getShops($city) as $row) {
    $rowShop = $tpl->fetch('shops_header_row');
    $rowShop->assign('NAME', $row['name']);
    $rowShop->assign('URL', $row['url']);
    $tpl->assign('shops_header_row', $rowShop);
}

$search = Core_Array::getRequest('search');

foreach ($data->getModels($search) as $row) {
    $rowCar = $tpl->fetch('cars_row');
    $rowCar->assign('CAR', $row['car']);
    $rowCar->assign('MODEL', $row['model']);

    foreach ($data->getShops($city) as $row_shop) {
        $priceInfo = $data->getPriceInfo($row_shop['id'],$row['model_id']);
        $rowShop = $rowCar->fetch('shops_row');
        $rowShop->assign('PRICE', $priceInfo['price'] ? number_format( $priceInfo['price'],0,'',' ') : '-');
        $rowShop->assign('UPDATE', Main::convertToDateFormat($priceInfo['updated_at']));
        $rowShop->assign('URL', $priceInfo['url']);
        $rowShop->assign('STATUS', $priceInfo['status']);
        $rowShop->assign('ID', $priceInfo['id']);

        $rowCar->assign('shops_row', $rowShop);
    }

    $tpl->assign('cars_row', $rowCar);
}

$tpl->display();