<?php
require_once 'softcprFiles.php';
//显示软件著作权详细信息
function showDetailSoftCprInfo($con, $id) {
	$html = '';
	$sql = "select * from softcpr where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$owner = $arr['owner'];
			$author = $arr['author'];
			$name = $arr['name'];
			$time = $arr['time'];
			$num = $arr['num'];
			$html .= "<p>软件名：$name</p>";
			$html .= "<p>作者：$author</p>";
			$html .= "<p>申请时间：$time</p>";
			$html .= "<p>著作权人：$owner</p>";
			$html .= "<p>著作权号：$num</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showSoftcprFiles($id, $name, $con);
	$html .= "</div></div>";
	return $html;
}
?>