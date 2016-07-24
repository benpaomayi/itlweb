<?php
//显示软件著作权修改详细信息
function showAlteredSoftCprInfo($con, $alterType, $id, $selfUrl) {
	$html = '';
	$sql = "select * from softcpr where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$owner = $arr['owner'];
			$author = $arr['author'];
			$name = $arr['name'];
			$time = $arr['time'];
			$num = $arr['num'];
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>软件著作权信息</p>";
			$html .= "<p><span>软件名</span><input type='text' name='name' value='$name' />";
			$html .= "<span>作者</span><input type='text' name='author' value='$author' /></p>";
			$html .= "<p><span>著作权人</span><input type='text' name='owner' value='$owner' /></p>";
			$html .= "<p><span>申请时间</span><input type='text' name='time' value='$time' />(如：2015.6)</p>";
			$html .= "<p><span>著作权号</span><input type='text' name='num' value='$num' /></p>";
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>申请书</span><input type='file' name='application' /></p>";
			$html .= "<p><span>登记证书</span><input type='file' name='registerCert' /></p>";
		}
	} else {
		$html .= '查询详细软件著作权信息失败：'.mysql_errno();
	}
	return $html;
}
?>