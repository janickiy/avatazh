<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_car.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    $name = trim(htmlspecialchars(Core_Array::getPost('name')));

    if (empty($name)) $errors[] = 'Укажите наззвание!';

    if (empty($errors)) {
        $fields = [
            'id' => 0,
            'name' => $name,
        ];

        if ($data->addCar($fields)){
            header("Location: ./?t=cars");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Действия не были выполнены.';
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

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Добавление автомобиля');
$tpl->assign('TITLE', 'Добавление автомобиля');

$tpl->display();