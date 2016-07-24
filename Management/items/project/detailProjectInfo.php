<?php
require_once 'projectFiles.php';
// 显示项目详细信息
function showDetailProjectInfo($con, $id) {
	$currentPapers = 0;
	$arrPaperId = array();
	$html = '';
	$html .= "<div id='projectInfoDetail' class='detailInfo'>";
	$sql = "select * from project where id='$id'";
	if ($res = mysql_query ( $sql, $con )) {
		while ( $arr = mysql_fetch_array ( $res ) ) {
			$name = $arr ['name'];
			$num = $arr ['num'];
			$type = $arr ['type'];
			$owner = $arr ['owner'];
			$cooper = $arr ['cooper'];
			$host = $arr ['host'];
			$sum = $arr ['sum'];
			$other = $arr ['other'];
			$time = $arr ['time'];
			$estabtime = $arr ['estabtime'];
			$quota = $arr ['quota'];
			$papersum = $arr ['papersum'];
			$patentsum = $arr ['patentsum'];
			$html .= "<p>名称：$name</p>";
			$html .= "<p><span>编号：$num</span>";
			$html .= "<span class='span_col2'>类别：$type</span></p>";
			$html .= "<p><span>归属单位：$owner</span>";
			$html .= "<span class='span_col2'>合作单位：$cooper</span></p>";
			$html .= "<p><span>主持人：$host</span>";
			$html .= "<span class='span_col2'>资助金额：$sum</span></p>";
			$html .= "<p><span>其他参与人：$other</span>";
			$html .= "<span class='span_col2'>起止时间：$time</span></p>";
			$html .= "<p><span>所需论文数：$papersum</span>";
			$html .= "<span class='span_col2'>立项时间：$estabtime</span></p>";
			$html .= "<p><span>所需专利数：$patentsum</span></p>";
			$html .= "<p>结题指标：$quota</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：' . mysql_errno ();
	}
	$html .= "</div>";
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showProjectFiles($id, $name, $con);
	$html .= "</div></div>";
	$html .= "<div id='projectInfoCorrel' class='correlInfo'>";
	$sql = "select id from paper where projectnum like '%$num%'";
	if ($res = mysql_query ( $sql, $con )) {
		while ($arr = mysql_fetch_array ( $res )) {
			$paperId = $arr[0];
			$sqlNum = "select projectnum from paper where id='$paperId'";
			if($resNum = mysql_query($sqlNum, $con)) {
				while($arr = mysql_fetch_array($resNum)) {
					if($arr[0] != '') {
						$arrNum = explode(',', $arr[0]);
						for($i=0; $i<count($arrNum); $i++) {
							if(trim($arrNum[$i]) == $num) {
								$currentPapers++;
								$arrPaperId[] = $paperId;
							}
						}
					}
				}
			}
		}
	}
	
	$html .= "<p class='p_background'>论文指标：$currentPapers($papersum)</p>";
	$html .= "<table>";
	$html .= "<tr><td>论文名称</td><td>刊物名称</td><td>级别</td></tr>";
	for ($i=0; $i<count($arrPaperId); $i++) {
		$sql = "select id,name,journame,type from paper where id='".$arrPaperId[$i]."'";
		if ($res = mysql_query ( $sql, $con )) {
			while ( $arr = mysql_fetch_array ( $res ) ) {
				$html .= "<tr><td><span id='paper_" . $arr ['id'] . "'>" . $arr ['name'] . "</span></td><td>" . $arr ['journame'] . "</td><td>". $arr['type'] ."</td></tr>";
			}
		}
	}
	$html .= "</table>";
	$html .= "</div>";
	return $html;
}
?>