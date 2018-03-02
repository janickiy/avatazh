<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_account.tpl");

$errors = [];

if (Core_Array::getRequest('action')) {
    $login = trim(htmlspecialchars(Core_Array::getPost('login')));
    $password = trim(Core_Array::getPost('password'));
    $password_again = trim(Core_Array::getPost('password_again'));
    $role = Core_Array::getPost('user_role');

    if (empty($login)) $errors[] = 'Введите логин!';
    if (empty($password)) $errors[] = 'Пароль не введен!';
    if (empty($password_again)) $errors[] = 'Введите повторно пароль!';

    if (!empty($password) && !empty($password_again)){
        if ($password != $password_again) $errors[] = 'Пароли не совпадают!';
    }

    if (!empty($login)) {
        if ($data->checkExistLogin($login)) $errors[] = 'Это логин уже существует! Введите другой логин';
    }

    if (empty($errors)) {
        $fields = [
            'login'    => $login,
            'password' => md5($password),
            'role'     => $role
        ];

        if ($data->createAccount($fields)){
            header("Location: ./?t=accounts");
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
$tpl->assign('TITLE_PAGE', 'Добавление учетной записи');
$tpl->assign('TITLE', 'Добавление учетной записи');


$tpl->display();