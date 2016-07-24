<?php
function getSoftcprInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$owner = $arr['owner'];
	$author = $arr['author'];
	$name = $arr['name'];
	$time = $arr['time'];
	$num = $arr['num'];
	$sqlIsFileExist = "select * from softcpr_path where softcpr_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['registercert_name'] !== '' || $arrIsFileExist['application_name'] !== '') {
			$isFileExist = '有';
		}
	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='softcpr' id='$id'>";
	$html .= "<td>$owner</td>";
	$html .= "<td>$author</td>";
	$html .= "<td>$name</td>";
	$html .= "<td>$time</td>";
	$html .= "<td>$num</td>";
	$html .= "<td><span id='softcprdown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>