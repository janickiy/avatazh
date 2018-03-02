<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "edit_model.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    $name = trim(htmlspecialchars(Core_Array::getPost('name')));
    $id = trim(htmlspecialchars(Core_Array::getPost('id')));

    if (empty($name)) $errors[] = 'Введите название модели!';

    if (empty($errors)) {
        $fields = [
            'name' => $name,
        ];

        if ($data->updateModel($fields, $id)) {
            header("Location: ./?t=cars");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Действия не были выполнены';
        }
    }
}

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Редактирование модели');
$tpl->assign('TITLE', 'Редактирование модели');

$row = $data->getModel(Core_Array::getRequest('id'));

$tpl->assign('NAME', Core_Array::getPost('name') ? Core_Array::getPost('name')  : $row['name']);
$tpl->assign('ID', $row['id']);

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