<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "edit_url_price.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Редактирование ссылки на цену');
$tpl->assign('TITLE', 'Редактирование ссылки на цену');

$errors = [];

if (Core_Array::getRequest('action')) {
    $url = trim(Core_Array::getPost('url'));
    $id = Core_Array::getPost('id');

    if (empty($url)) $errors[] = 'Введите url!';

    if (!empty($url)) {
        if (!preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $url)) $errors[] = 'URL адрес введен неверно!';
    }

    if (empty($errors)) {
        $fields = [
            'url' => $url
        ];

        if ($data->updateUrlPrice($fields, $id)) {
            header("Location: ./");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Действия не были выполнены';
        }
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

$row = $data->getPriceByInfo(Core_Array::getRequest('id'));
$tpl->assign('URL', Core_Array::getPost('url') ? Core_Array::getPost('url')  : $row['url']);
$tpl->assign('ID', Core_Array::getRequest('id'));
$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);

$tpl->display();