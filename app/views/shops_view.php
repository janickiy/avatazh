<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "shops.tpl");

$errors = [];

if (Core_Array::getRequest('action') == 'remove') {
   if ($data->removeShop(Core_Array::getRequest('id'))) {
      header("Location: ./?t=shops");
       exit();
   } else {
       $errors[] = 'Ошибка веб приложения! Действия не были выполнены.';
   }
}

$tpl->assign('TITLE_PAGE', 'Автосалоны');
$tpl->assign('TITLE', 'Автосалоны');

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

if (!empty($errors)){
    $errorBlock = $tpl->fetch('show_errors');

    foreach($errors as $row){
        $rowBlock = $errorBlock->fetch('row');
        $rowBlock->assign('ERROR', $row);
        $errorBlock->assign('row', $rowBlock);
    }

    $tpl->assign('show_errors', $errorBlock);
}

foreach ($data->getShops() as $row) {
    $rowShop = $tpl->fetch('shops_row');
    $rowShop->assign('NAME', $row['name']);
    $rowShop->assign('URL', $row['url']);
    $rowShop->assign('ID', $row['id']);
    $rowShop->assign('STATUS', $row['status']);
    $tpl->assign('shops_row', $rowShop);
}

$tpl->display();