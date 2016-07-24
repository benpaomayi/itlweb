<?php
//显示获奖修改详细信息
function showAlteredRewdInfo($con, $alterType, $id, $selfUrl) {
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
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>获奖信息</p>";
			$html .= "<p><span>名称</span><input type='text' name='name' value='$name' /></p>";
			$html .= "<p><span>获奖人</span><input type='text' name='honoree' value='$honoree' />(用英文逗号分隔)</p>";
			$html .= "<p><span>类型</span><input type='text' name='type' value='$type' />";
			$html .= "<span>级别</span><input type='text' name='level' value='$level' /></p>";
			$html .= "<p><span>时间</span><input type='text' name='time' value='$time' />(如：2015.6)<p>";
			$html .= "<p><span>证书号</span><input type='text' name='num' value='$num' /></p>";
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>获奖证书</span><input type='file' name='rewardCert' /></p>";
		}
	} else {
		$html .= '查询详细获奖信息失败：'.mysql_errno();
	}
	return $html;
}
?>