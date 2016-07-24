<?php
require_once 'rewardFiles.php';
//显示获奖详细信息
function showDetailRewdInfo($con, $id) {
	$html = '';
	$sql = "select * from reward where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$type = $arr['type'];
			$level = $arr['level'];
			$name = $arr['name'];
			$honoree = $arr['honoree'];
			$time = $arr['time'];
			$num = $arr['num'];
			$html .= "<p>名称：$name</p>";
			$html .= "<p>获奖人：$honoree</p>";
			$html .= "<p>类型：$type</p>";
			$html .= "<p>级别：$level</p>";
			$html .= "<p>时间：$time</p>";
			$html .= "<p>证书号：$num</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showRewdFiles($id, $name, $con);
	$html .= "</div></div>";
	return $html;
}
?>