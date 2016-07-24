<?php
function getPaperResult($html, $arr, $string, $con) {
	$html .= "<tr>";
	$html .= "<td>论文作者</td>";
	$html .= "<td>刊物名称</td>";
	$html .= "<td>论文名</td>";
	$html .= "<td>刊出时间</td>";
	$html .= "<td>刊物级别</td>";
	$html .= "<td>附件</td>";
	$html .= "<td></td>";
	$html .= "</tr>";
	$arr = searchPaper ( $html, $con );
	if (isset ( $arr ['info'] )) {
		$i = 1;
		$string .= "\r\n论文：\r\n";
		foreach ( $arr ['info'] as $info ) {
			$string .= "[$i] ".$info['firstauth'].", ".$info['othauth'].", "."\"".$info['name']."\", ".$info['journame'].", ".$info['time'].", ".$info['journum'].", ".$info['page'].".\r\n";
			$i++;
		}
	}
	$arr['string'] = $string;
	return $arr;
}