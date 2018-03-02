<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_shop.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    $name = trim(htmlspecialchars(Core_Array::getPost('name')));
    $url = trim(Core_Array::getPost('url'));
    $template = trim(Core_Array::getPost('template'));
    $pos = trim(Core_Array::getPost('pos'));
    $city = Core_Array::getPost('city');

    if (empty($name)) $errors[] = 'Введите название автосалона!';
   // if (!empty($url)) {
      //  if (Main::checkUrl($url)) $errors[] = 'URL адрес введен неверно!';
   // }

    if ($data->checkExistShop($name, $url)) $errors[] = 'Этот автосалон уже был добавлен!';

    if (empty($errors)) {
        $fields = [
            'id' => 0,
            'name' => $name,
            'url'  => parse_url($url, PHP_URL_HOST),
            'city' => $city,
            'template' => $template,
            'pos' => Core_Array::getPost('pos') ? Core_Array::getPost('pos') : 0,
            'status' => 1,
        ];

        if ($data->addShop($fields)) {
            header("Location: ./?t=shops");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Действия не были выполнены.';
        }
    }
}

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Добавление автосалона');
$tpl->assign('TITLE', 'Добавление автосалона');

$tpl->assign('NAME', Core_Array::getRequest('name'));
$tpl->assign('URL', Core_Array::getRequest('url'));
$tpl->assign('TEMPLATE', Core_Array::getRequest('template'));
$tpl->assign('POS', Core_Array::getRequest('pos'));
$tpl->assign('CITY', Core_Array::getRequest('city'));

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