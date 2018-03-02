<?php

ob_end_clean();

core::requireEx('libs', "PHPExcel/PHPExcel.php");

$city = isset($_COOKIE["city"]) && $_COOKIE["city"] ? $_COOKIE["city"] : 1;

$dataArray1 = [['Марка','Модель',],];
$dataArray2 = [];

foreach ($data->getShops($city) as $row) {
    $dataArray2[] = $row['name'];
}

$dataArray = [];
$dataArray[0] = array_merge($dataArray1[0], $dataArray2);

$dataArray3 = [];
$dataArray4 = [];
$i = 0;
foreach ($data->getModels() as $row) {
    $i++;
    $dataArray4 = [[$row['car'],$row['model']],] ;
    $dataArray5 = [];

    foreach ($data->getShops($city) as $row_shop) {
        $priceInfo = $data->getPriceInfo($row_shop['id'],$row['model_id']);
        $dataArray5[] = $priceInfo['price'];
    }

    $dataArray[$i] = array_merge($dataArray4[0], $dataArray5);

    unset($dataArray4);
    unset($dataArray5);
}

$doc = new PHPExcel();
$doc->setActiveSheetIndex(0);
$doc->getActiveSheet()->fromArray($dataArray);
$filename = 'price.xls';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($doc, 'Excel5');
$objWriter->save('php://output');