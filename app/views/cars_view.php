<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "cars.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Автомобили');
$tpl->assign('TITLE', 'Автомобили');

$errors = [];

if (Core_Array::getRequest('action')) {
    if ($data->deleteModels( Core_Array::getRequest('activate'))) {
        $success_msg =  'Выбранные модели удалены';
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

$arrs = $data->getAllCars();
$modelarray = [];

foreach($arrs as $row) {
    if ($row['name'] && $row['id']) $modelarray[] = [$row['name'],$row['id']];
}

$cols = 3;
$total = count($modelarray);
$number = (int)($total / $cols);
if ((float)($total / $cols) - $number != 0) $number++;

$new_array = [];

for ($i = 0; $i < $number; $i++) {
    for($j = 0; $j < $cols; $j++) {
        $new_array[$i][$j] = $modelarray[$j*$number + $i];
    }
}

for ($i = 0; $i < $number; $i++) {
    $rowCar = $tpl->fetch('row_cars');

    for ($j = 0; $j < $cols; $j++) {
        $columnBlock = $rowCar->fetch('column');

        if ($new_array[$i][$j][0]) {
            $columnBlock->assign('NAME', $new_array[$i][$j][0]);
            $columnBlock->assign('ID', $new_array[$i][$j][1]);

            foreach ($data->getModels($new_array[$i][$j][1]) as $model_row) {
                $rowModel = $columnBlock->fetch('row_model');
                $rowModel->assign('NAME', $model_row['name']);
                $rowModel->assign('ID', $model_row['id']);
                $columnBlock->assign('row_model', $rowModel);
            }
        }

        $rowCar->assign('column', $columnBlock);
    }

    $tpl->assign('row_cars', $rowCar);
}

$tpl->display();