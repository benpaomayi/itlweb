<?php
require_once 'conferenceFiles.php';
//显示会议详细信息
function showDetailConfInfo($con, $id) {
	$html = '';
	$sql = "select * from conference where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$name = $arr['name'];
			$attendee = $arr['attendee'];
			$position = $arr['position'];
			$time = $arr['time'];
			$unit = $arr['unit'];
			$html .= "<p>会议名：$name</p>";
			$html .= "<p>参会人：$attendee</p>";
			$html .= "<p>地点：$position</p>";
			$html .= "<p>时间：$time</p>";
			$html .= "<p>主办单位：$unit</p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	$html .= "<div class='div_files'>";
	$html .= "<p class='p_background'>附件</p>";
	$html .= "<div class='filelist'>";
	$html .= showConfFiles($id, $name, $con);
	$html .= "</div></div>";
	return $html;
}
?>