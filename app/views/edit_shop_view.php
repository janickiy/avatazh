<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "edit_shop.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    $name = trim(htmlspecialchars(Core_Array::getPost('name')));
    $url = trim(Core_Array::getPost('url'));
    $template = trim(Core_Array::getPost('template'));
    $pos = trim(Core_Array::getPost('pos'));
    $city = Core_Array::getPost('city');
    $id = Core_Array::getRequest('id');
    $status = Core_Array::getRequest('status') == 'on' ? 1 : 0;

    if (empty($name)) $errors[] = 'Введите название автосалона!';

    if (empty($errors)) {
        $fields = [
            'name' => $name,
            'url'  => $url,
            'city' => $city,
            'template' => $template,
            'pos' => $pos,
            'status' => $status,
        ];

        if ($data->editShop($fields,$id)) {
            header("Location: ./?t=shops");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Действия не были выполнены';
        }
    }
}

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Редактирование автосалона');
$tpl->assign('TITLE', 'Редактирование автосалона');

$row = $data->getShopById(Core_Array::getRequest('id'));

$tpl->assign('NAME', Core_Array::getPost('name') ? Core_Array::getPost('name')  : $row['name']);
$tpl->assign('URL', Core_Array::getPost('url') ? Core_Array::getPost('url')  : $row['url']);
$tpl->assign('TEMPLATE', Core_Array::getPost('template') ? Core_Array::getPost('template')  : $row['template']);
$tpl->assign('POS', Core_Array::getPost('pos') ? Core_Array::getPost('pos')  : $row['pos']);
$tpl->assign('STATUS', Core_Array::getPost('status') ? Core_Array::getPost('status')  : $row['status']);
$tpl->assign('CITY', Core_Array::getPost('city') ? Core_Array::getPost('city')  : $row['city']);
$tpl->assign('ID', Core_Array::getRequest('id'));

if (!empty($errors)) {
    $errorBlock = $tpl->fetch('show_errors');

    foreach($errors as $row) {
        $rowBlock = $errorBlock->fetch('row');
        $rowBlock->assign('ERROR', $row);
        $errorBlock->assign('row', $rowBlock);
    }

    $tpl->assign('show_errors', $errorBlock);
}

$tpl->display();