<?php
function getPatentResult($html, $arr, $string, $con) {
	$html .= "<tr>";
	$html .= "<td>发明人</td>";
	$html .= "<td>专利权人</td>";
	$html .= "<td>专利名</td>";
	$html .= "<td>申请时间</td>";
	$html .= "<td>是否授权</td>";
	$html .= "<td>专利号</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchPatent ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n专利：\r\n";
		foreach ( $arr ['info'] as $info ) {
			if($info['state'] == '是') {
				$string .= "[$i] 发明专利授权：".$info['inventor'].". ".$info['name'].". 专利号：".$info['num'].", ".$info['time'].".\r\n";
			} else if($info['state'] == '否') {
				$string .= "[$i] 发明专利申请：".$info['inventor'].". ".$info['name'].". 申请号：".$info['num'].", ".$info['time'].".\r\n";
			}
			$i++;
		}
	}
	$arr['string'] = $string;
	return $arr;
}