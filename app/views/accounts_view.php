<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() . "accounts.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Учётные записи');
$tpl->assign('TITLE', 'Учётные записи');

$errors = [];

if (Core_Array::getRequest('action') == 'remove'){
    $accountInfo = Auth::getAutInfo(Core_Array::getGet('id'));

    if ($accountInfo['login'] != $autInfo['login']) {
        if ($data->removeAccount((int)Core_Array::getGet('id'))){
            $success_msg = 'Аккаунт удален';
        } else {
            $errors[] = 'web_apps_error';
        }
    }
}

foreach ($data->getAccountList() as $row){
    $rowBlock = $tpl->fetch('row');
    $rowBlock->assign('ID', $row['id']);
    $rowBlock->assign('LOGIN', $row['login']);

    if ($row["role"] == 'admin')
        $role = 'Админ';
    elseif ($row["role"] == 'manager')
        $role = 'Менеджер';

    $rowBlock->assign('ROLE', $role);

    if ($row['login'] != $autInfo['login']) $rowBlock->assign('ALLOW_EDIT', 'yes');

    $tpl->assign('row', $rowBlock);
}

$tpl->display();