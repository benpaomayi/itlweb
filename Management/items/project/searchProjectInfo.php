<?php
function getProjectInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$name = $arr['name'];
	$num = $arr['num'];
	$type = $arr['type'];
	$owner = $arr['owner'];
	$cooper = $arr['cooper'];
	$host = $arr['host'];
	$sum = $arr['sum'];
	$other = $arr['other'];
	$time = $arr['time'];
	$quota = $arr['quota'];
	$sqlIsFileExist = "select * from project_path where project_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['application_name'] !== '' || $arrIsFileExist['endreport_name'] !== '' || $arrIsFileExist['plan_name'] !== '' || $arrIsFileExist['contract_name'] !== '' || $arrIsFileExist['acceptcert_name'] !== '') {
			$isFileExist = '有';
		}
	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='project' id='$id'>";
	$html .= "<td>$host</td>";
	$html .= "<td>$other</td>";
	$html .= "<td>$name</td>";
	$html .= "<td>$type</td>";
	$html .= "<td>$sum</td>";
	$html .= "<td>$time</td>";
	$html .= "<td><span id='projectdown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>