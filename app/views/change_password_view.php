<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() . "change_password.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Сменить пароль');
$tpl->assign('TITLE', 'Сменить пароль');

$errors = [];

if (Core_Array::getPost('action')) {
    $current_password = trim(Core_Array::getPost('current_password'));
    $password = trim(Core_Array::getPost('password'));
    $password_again = trim(Core_Array::getPost('password_again'));

    if (!$current_password) {
        $errors[] = 'Введите текущий пароль!';
    }

    if (!$password) {
        $errors[] = 'Пароль не введен!';
    }

    if (!$password_again) {
        $errors[] = 'Введите повторно пароль!';
    }

    if ($password && $password_again && $password != $password_again) {
        $errors[] = 'Пароли не совпадают!';
    }

    if ($current_password){
        $current_password = md5($_POST["current_password"]);

        if (Auth::getCurrentHash($autInfo['id']) != $current_password) {
            $errors[] = 'Текущий пароль неверен!';
        }
    }

    if (empty($errors)) {
        if ($data->changePassword($password, $autInfo['id'])) {
            $success_msg = 'Пароль сменён';
        } else {
            $errors[] = 'Пароль не был сменён!';
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

if (isset($success_msg)) {
    $tpl->assign('MSG_ALERT', $success_msg);
}

$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);



$tpl->display();