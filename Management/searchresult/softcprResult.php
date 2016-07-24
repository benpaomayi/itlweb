<?php
function getSoftcprResult($html, $arr, $string, $con) {
	$html .= "<tr>";
	$html .= "<td>著作权人</td>";
	$html .= "<td>作者</td>";
	$html .= "<td>软件名</td>";
	$html .= "<td>申请时间</td>";
	$html .= "<td>著作权号</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchSoftcpr ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n软件著作权：\r\n";
		foreach ( $arr ['info'] as $info ) {
			$string .= "[$i] 软件著作权：".$info['name'].", 登记号：".$info['num'].".\r\n";
			$i++;
		}
	}
	$arr['string'] = $string;
	return $arr;
}