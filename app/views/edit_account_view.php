<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "edit_account.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Редактирование учётной записи');
$tpl->assign('TITLE', 'Редактирование учётной записи');

$errors = [];

if (Core_Array::getRequest('action')) {
    $password = trim(Core_Array::getPost('password'));
    $password_again = trim(Core_Array::getPost('password_again'));
    $role = Core_Array::getPost('user_role');
    $id = (int)Core_Array::getPost('id');

    if (!empty($password) && !empty($password_again)) {
        if ($password != $password_again) $errors[] = 'Пароли не совпадают!';
    }

    if (empty($errors)) {
        if (!empty($password)) $fields['password'] = md5($password);

        $fields = ['role' => $role];

        if ($result = $data->editAccount($fields, $id)) {
            header("Location: ./?t=accounts");
            exit();
        } else {
            $errors[] = 'web_apps_error';
        }
    }
}

if (!empty($errors)){
    $errorBlock = $tpl->fetch('show_errors');

    foreach($errors as $row){
        $rowBlock = $errorBlock->fetch('row');
        $rowBlock->assign('ERROR', $row);
        $errorBlock->assign('row', $rowBlock);
    }

    $tpl->assign('show_errors', $errorBlock);
}

$tpl->assign('RETURN_BACK_LINK', './?t=accounts');
$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);

$row = $data->getAccountInfo((int)Core_Array::getGet('id'));
$tpl->assign('USER_ROLE', $row['role']);
$tpl->assign('ID', Core_Array::getRequest('id'));

$tpl->display();