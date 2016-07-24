<?php
require_once 'paperFiles.php';
//显示论文详细信息
function showDetailPaperInfo($con, $id) {
	$html = '';
	$html .= "<div id='paperInfoDetail' class='detailInfo'>";
	$sql = "select * from paper where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$firstauth = $arr['firstauth'];
			$othauth = $arr['othauth'];
			$comauth = $arr['comauth'];
			$name = $arr['name'];
			$journame = $arr['journame'];
			$journum = $arr['journum'];
			$page = $arr['page'];
			$time = $arr['time'];
			$adoptime = $arr['adoptime'];
			$type = $arr['type'];
			$projectnum = $arr['projectnum'];
			$state = $arr['state'];
			$html .= "<p>名称：$name</p>";
			$html .= "<p><span>第一作者：$firstauth</span>";
			$html .= "<span class='span_col2'>其他作者：$othauth</span></p>";
			$html .= "<p><span>刊物名称：$journame</span>";
			$html .= "<span class='span_col2'>通讯作者：$comauth</span></p>";
			$html .= "<p><span>刊物期号：$journum</span>";
			$html .= "<span class='span_col2'>页码：$page</span></p>";
			$html .= "<p><span>刊出时间：$time</span>";
			$html .= "<span  class='span_col2'>录用时间：$adoptime</span></p>";
			$html .= "<p><span>刊物级别：$type</span>";
			$html .= "<span class='span_col2'>投稿状态：$state</span></p>";
			$html .= "<p><span>所挂项目编号：$projectnum</span></p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "</div>";
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showPaperFiles($id, $name, $con);
	$html .= "</div></div>";
	$html .= "<div id='paperInfoCorrel' class='correlInfo'>";
	$html .= "<p class='p_background'>支撑项目：</p>";
	$html .= "<table>";
	$html .= "<tr><td>项目编号</td><td>项目名称</td></tr>";
	if ($projectnum != '') {
		$arrProjectNum = explode(',', $projectnum);
		for($i=0; $i<count($arrProjectNum); $i++) {
		$sql = "select id,name from project where num='".trim($arrProjectNum[$i])."'";
			if($res = mysql_query($sql,$con)) {
				while ($arr = mysql_fetch_array($res)) {
					$html .= "<tr><td>".trim($arrProjectNum[$i])."</td><td><span id='project_".$arr['id']."'>".$arr['name']."</span></td></tr>";
				}
			}
		}
	}
	$html .= "</table>";
	$html .= "</div>";
	return $html;
}
?>