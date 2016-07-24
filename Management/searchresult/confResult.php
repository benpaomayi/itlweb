<?php
function getConfResult($html, $arr, $string, $con){
	$html .= "<tr>";
	$html .= "<td>会议名</td>";
	$html .= "<td>参会人</td>";
	$html .= "<td>地点</td>";
	$html .= "<td>时间</td>";
	$html .= "<td>主办单位</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchConf ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n会议：\r\n";
		foreach ( $arr ['info'] as $info ) {
			$string .= "[$i] ".$info['attendee'].", ".$info['name'].", ".$info['position'].".\r\n";
			$i++;
		}
	}
	$arr['string'] = $string;
	return $arr;
}