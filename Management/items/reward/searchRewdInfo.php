<?php
function getRewardInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$type = $arr['type'];
	$level = $arr['level'];
	$name = $arr['name'];
	$honoree = $arr['honoree'];
	$time = $arr['time'];
	$num = $arr['num'];
	$sqlIsFileExist = "select * from reward_path where reward_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['rewardcert_name'] !== '') {
			$isFileExist = '有';
		}
	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='reward' id='$id'>";
	$html .= "<td>$honoree</td>";
	$html .= "<td>$name</td>";
	$html .= "<td>$type</td>";
	$html .= "<td>$level</td>";
	$html .= "<td>$time</td>";
	$html .= "<td>$num</td>";
	$html .= "<td><span id='rewarddown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>