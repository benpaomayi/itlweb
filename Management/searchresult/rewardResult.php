<?php
function getRewardResult($html, $arr, $string, $con){
	$html .= "<tr>";
	$html .= "<td>获奖人</td>";
	$html .= "<td>名称</td>";
	$html .= "<td>类型</td>";
	$html .= "<td>级别</td>";
	$html .= "<td>时间</td>";
	$html .= "<td>证书号</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchReward ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n获奖：\r\n";
		foreach ( $arr ['info'] as $info ) {
			$string .= "[$i] 获奖成果：".$info['name'].", ".$info['time'].", 证书号：".$info['num'].".\r\n";
			$i++;
		}
	}
	$arr['string'] = $string;
	return $arr;
}