<?php
function getConfInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$name = $arr['name'];
	$attendee = $arr['attendee'];
	$position = $arr['position'];
	$time = $arr['time'];
	$unit = $arr['unit'];
	$sqlIsFileExist = "select * from conference_path where conference_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['invitation_name'] !== '' || $arrIsFileExist['receipt_name'] !== '' || $arrIsFileExist['speech_name'] !== '') {
			$isFileExist = '有';
		}

	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='conference' id='$id'>";
	$html .= "<td>$name</td>";
	$html .= "<td>$attendee</td>";
	$html .= "<td>$position</td>";
	$html .= "<td>$time</td>";
	$html .= "<td>$unit</td>";
	$html .= "<td><span id='confdown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>