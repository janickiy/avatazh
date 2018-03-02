<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_model.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    if (count(Core_Array::getPost('name')) > 0) {
        for($i = 0; $i < count(Core_Array::getPost('name')); $i++) {
            $name = Core_Array::getPost('name');
            $name[$i] = trim($name[$i]);

            if (!empty($name[$i])) {
                $fields = [
                    'id' => 0,
                    'name' => $name[$i],
                    'car_id' => Core_Array::getRequest('car_id'),
                ];

                $data->addModel($fields);
            }
        }
    }

    header("Location: ./?t=cars");
    exit();
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
$tpl->assign('TITLE_PAGE', 'Добавление модели');
$tpl->assign('TITLE', 'Добавление модели');
$car = $data->getCarById(Core_Array::getGet('car_id'));
$tpl->assign('CAR', $car['name']);
$tpl->assign('ID', $car['id']);
$tpl->display();