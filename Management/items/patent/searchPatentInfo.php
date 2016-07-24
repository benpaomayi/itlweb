<?php
function getPatentInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$inventor = $arr['inventor'];
	$owner = $arr['owner'];
	$name = $arr['name'];
	$time = $arr['time'];
	$state = $arr['state'];
	$num = $arr['num'];
	$sqlIsFileExist = "select * from patent_path where patent_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['appmanual_name'] !== '' || $arrIsFileExist['authmanual_name'] !== '' || $arrIsFileExist['authcert_name'] !== '') {
			$isFileExist = '有';
		}
	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='patent' id='$id'>";
	$html .= "<td>$inventor</td>";
	$html .= "<td>$owner</td>";
	$html .= "<td>$name</td>";
	$html .= "<td>$time</td>";
	$html .= "<td>$state</td>";
	$html .= "<td>$num</td>";
	$html .= "<td><span id='patentdown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>