<?php
function getPaperInfo($arr, $con) {
	$isFileExist = '';
	$id = $arr['id'];
	$firstauth = $arr['firstauth'];
	$othauth = $arr['othauth'];
	$comauth = $arr['comauth'];
	$name = $arr['name'];
	$journame = $arr['journame'];
	$journum = $arr['journum'];
	$startStopPage = $arr['page'];
	$time = $arr['time'];
	$adoptime = $arr['adoptime'];
	$type = $arr['type'];
	$projectnum = $arr['projectnum'];
	$state = $arr['state'];
	$sqlIsFileExist = "select * from paper_path where paper_id='$id'";
	if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
		while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
		if($arrIsFileExist['paperscan_name'] !== '' || $arrIsFileExist['digitalorg_name'] !== '' || $arrIsFileExist['retrivalcert_name'] !== '' ) {
			$isFileExist = '有';
		}
	} else {
		echo "无法查找出是否有附件";
		break;
	}
	$html = "<tr data-type='paper' id='$id'>";
	$html .= "<td>$firstauth,$othauth</td>";
	$html .= "<td>$journame</td>";
	$html .= "<td>$name</td>";
	$html .= "<td>$time</td>";
	$html .= "<td>$type</td>";
	$html .= "<td><span id='paperdown_$id' class='isFileExist'>$isFileExist</span><td>";
	$html .= "</tr>";
	return $html;
}
?>