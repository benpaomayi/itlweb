<?php
require_once 'patentFiles.php';
//显示专利详细信息
function showDetailPatentInfo($con, $id) {
	$html = '';
	$sql = "select * from patent where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$inventor = $arr['inventor'];
			$owner = $arr['owner'];
			$name = $arr['name'];
			$time = $arr['time'];
			$state = $arr['state'];
			$num = $arr['num'];
			$html .= "<p>名称：$name</p>";
			$html .= "<p>发明人：$inventor</p>";
			$html .= "<p>时间：$time</p>";
			$html .= "<p>专利权人：$owner</p>";
			$html .= "<p>是否授权：$state</p>";
			$html .= "<p>专利号：$num</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showPatentFiles($id, $name, $con);
	$html .= "</div></div>";
	return $html;
}

?>