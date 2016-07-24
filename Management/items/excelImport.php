<?php
chdir(dirname(__FILE__));
require '../phpexcel/Classes/PHPExcel.php';
require_once './conference/insertConfInfoPath.php';
require_once './paper/insertPaperInfoPath.php';
require_once './patent/insertPatentInfoPath.php';
require_once './project/insertProjectInfoPath.php';
require_once './reward/insertRewdInfoPath.php';
require_once './softcpr/insertSoftcprInfoPath.php';
header("Content-type:text/html; charset=utf-8");
$objPHPExcel = new PHPExcel();
$reader = '';
$file =  $_FILES['excelFile'];
$locationUrl =  $_POST['locationUrl'];
$extension = pathinfo($file['name'])['extension'];
if($extension == 'xls') {
	$reader = new PHPExcel_Reader_Excel5();
} else if ($extension == 'xlsx') {
	$reader = new PHPExcel_Reader_Excel2007();;
} else {
	echo "不是excel文件！";
	header("Refresh:2; url=$locationUrl");
	exit(0);
}
$filePath = "../documents/temp/tmp.$extension";
if(move_uploaded_file($file['tmp_name'], $filePath)) {
	$excel = $reader->load($filePath);
	$sheet = $excel->getSheet(0);
	$columns = $sheet->getHighestColumn();
	$columns = PHPExcel_Cell::columnIndexFromString($columns);
	$rows = $sheet->getHighestRow();
}else{
	echo "文件上传失败！";
	exit(1);
}

function getCellValue($sheet,$i,$j){
	//return iconv('utf-8', 'gb2312', $sheet->getCellByColumnAndRow($i, $j)->getValue());
	return $sheet->getCellByColumnAndRow($i, $j)->getValue();
}
?>