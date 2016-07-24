<?php
//显示会议修改详细信息
function showAlteredConfInfo($con, $alterType, $id, $selfUrl) {
	$html = '';
	$sql = "select * from conference where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$name = $arr['name'];
			$attendee = $arr['attendee'];
			$position = $arr['position'];
			$time = $arr['time'];
			$unit = $arr['unit'];
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>会议信息</p>";
			$html .= "<p><span>会议名</span><input type='text' name='name' value='$name' />";
			$html .= "<span>地点</span><input type='text' name='position' value='$position' /></p>";
			$html .= "<p><span>参会人</span><input type='text' name='attendee' value='$attendee' />(用英文逗号分隔)</p>";
			$html .= "<p><span>时间</span><input type='text' name='time' value='$time' />(如：2015.6)</p>";
			$html .= "<p><span>主办单位</span><input type='text' name='unit' value='$unit' /></p>";
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>邀请函</span><input type='file' name='invitation' /></p>";
			$html .= "<p><span>注册回执</span><input type='file' name='receipt' /></p>";
			$html .= "<p><span>演讲材料</span><input type='file' name='speech' /></p>";
		}
	} else {
		$html .= '查询详细会议信息失败：'.mysql_errno();
	}
	return $html;
}
?>