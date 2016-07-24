<?php
function getProjectResult($html, $arr, $string, $con) {
	$html .= "<tr>";
	$html .= "<td>主持人</td>";
	$html .= "<td>其他参与人</td>";
	$html .= "<td>名称</td>";
	$html .= "<td>类别</td>";
	$html .= "<td>资助金额</td>";
	$html .= "<td>起止时间</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchProject ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n项目：\r\n";
		foreach ( $arr ['info'] as $info ) {
			if ($_SESSION ['host'] == 'host') {
				$string .= "[$i] ".$info ['time'] . ": 主持" . $info ['type'] . "\"" . $info ['name']."(". $info['num'] .")" . "\", 经费" . $info ['sum'] . "\r\n";
			} else if ($_SESSION ['other'] == 'other') {
				$string .= "[$i] ".$info ['time'] . ": 参与" . $info ['type'] . "\"" . $info ['name']."(". $info['num'] .")" . "\", 经费" . $info ['sum'] . "\r\n";
			} else {
				$string .= "[$i] ".$info ['time'] . ": " . $info ['type'] . "\"" . $info ['name']."(". $info['num'] .")" . "\", 经费" . $info ['sum'] . "\r\n";
			}
			$i++;
		}
	}
	$_SESSION ['owner'] = '';
	$_SESSION ['other'] = '';
	$arr['string'] = $string;
	return $arr;
}