<?php
//显示专利修改详细信息
function showAlteredPatentInfo($con, $alterType, $id, $selfUrl) {
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
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>专利信息</p>";
			$html .= "<p><span>发明人</span><input type='text' name='inventor' value='$inventor' />(用英文逗号分隔)</p>";
			$html .= "<p><span>专利名</span><input type='text' name='name' value='$name' />";
			$html .= "<span>专利权人</span><input type='text' name='owner' value='$owner' /></p>";
			$html .= "<p><span>申请时间</span><input type='text' name='time' value='$time' />(如：2015.6)</p>";
			$html .= "<p><span>专利号</span><input type='text' name='num' value='$num' />(如果没有授权则填申请号)</p>";
			if($state == '是') {
				$html .= "<p><span>是否授权</span><select name='state'><option value='是'>是</option><option value='否'>否</option></select>";
			} else {
				$html .= "<p><span>是否授权</span><select name='state'><option value='否'>否</option><option value='是'>是</option></select>";;
			}
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>申请说明书</span><input type='file' name='appManual' /></p>";
			$html .= "<p><span>授权说明书</span><input type='file' name='authManual' /></p>";
			$html .= "<p><span>授权证书</span><input type='file' name='authCert' /></p>";
		}
	} else {
		$html .= '查询详细专利信息失败：'.mysql_errno();
	}
	return $html;
}
?>