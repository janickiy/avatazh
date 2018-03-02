<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_url_price.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Добавление ссылки на цену');
$tpl->assign('TITLE', 'Добавление ссылки на цену');

$errors = [];

if (Core_Array::getRequest('action')) {
    $url = trim(Core_Array::getPost('url'));
    $model_id = Core_Array::getPost('model_id');

    if (count(Core_Array::getPost('referal')) > 0) {
        for($i = 0; $i < count(Core_Array::getPost('referal')); $i++) {
            $name = Core_Array::getPost('referal');
            $name[$i] = trim($name[$i]);
            $url = Core_Array::getPost('url');
            $url[$i] = trim($url[$i]);
            $model_id = Core_Array::getPost('model_id');
			
			$url[$i] = str_replace('https','http',$url[$i]);

            if (!empty($model_id[$i]) && preg_match('/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/', $url[$i])) {
                $shop_id = $data->getShopId($url[$i]);

               if ($data->checkExistPrice($shop_id,$model_id[$i]) === false) {
                   $fields = [
                       'id' => 0,
                       'shop_id' => $shop_id,
                       'url' => $url[$i],
                       'model_id' => $model_id[$i],
                       'created_at' => date("Y-m-d H:i:s"),
                       'updated_at' => '0000-00-00 00:00:00',
                       'status' => 'no',
                   ];
                   $data->addUrlPrice($fields);
               }
            }
        }
    }

    header("Location: ./");
    exit();

    /*
    if (empty($url)) $errors[] = 'Укажите URL адрес страницы с ценой!';
    if (empty($model_id)) $errors[] = 'Введите марку или модель!';

    if (!empty($url)) {
        if (Main::checkUrl($url)) $errors[] = 'URL адрес введен неверно!';
    }

    if (empty($errors)) {
        $shop_id = $data->getShopId($url);

        $fields = [
            'id' => 0,
            'shop_id' => $shop_id,
            'url' => $url,
            'model_id' => $model_id,
            'created_at' => date("Y-m-d H:i:s"),
            'status' => 'no',
        ];

        if ($data->addUrlPrice($fields)) {
            header("Location: ./");
            exit();
        } else {
            $errors[] = 'Ошибка веб приложения! Данные не были добавлены';
        }
    }
    */
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

$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);

$tpl->display();