<?php
//显示项目修改详细信息
function showAlteredProjectInfo($con, $alterType, $id, $selfUrl) {
	$html = '';
	$sql = "select * from project where id='$id'";
	if($res = mysql_query($sql, $con)) {
		while($arr = mysql_fetch_array($res)) {
			$name = $arr['name'];
			$num = $arr['num'];
			$type = $arr['type'];
			$owner = $arr['owner'];
			$cooper = $arr['cooper'];
			$host = $arr['host'];
			$sum = $arr['sum'];
			$other = $arr['other'];
			$time = $arr['time'];
			$estabtime = $arr['estabtime'];
			$quota = $arr['quota'];
			$papersum = $arr['papersum'];
			$patentsum = $arr['patentsum'];
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>项目信息</p>";
			$html .= "<p><span>名称</span><input name='name' type='text' value='$name'/>";
			$html .= "<span>编号</span><input name='num' type='text' value='$num'/></p>";
			$html .= "<p><span>类别</span><input name='type' type='text' value='$type'/>";
			$html .= "<span>归属单位</span><input name='owner' type='text' value='$owner'/></p>";
			$html .= "<p><span>合作单位</span><input name='cooper' type='text' value='$cooper'/>";
			$html .= "<span>主持人</span><input name='host' type='text' value='$host'/></p>";
			$html .= "<p><span>资助金额</span><input type='text' name='sum' value='$sum' /></p>";
        	$html .= "<p><span>其他参与人</span><input type='text' name='other' value='$other' />(用英文逗号分隔)</p>";
		    $html .= "<p><span>起止时间</span><input type='text' name='time' value='$time' />(如：2015.6)</p>";
			$html .= "<p><span>立项时间</span><input type='text' name='estabtime' value='$estabtime' />(如：2013.6-2015.6)</p>";
			$html .= "<p><span>所需论文数</span><input type='number' name='papersum' value='$papersum' />";
			$html .= "<span>所需专利数</span><input type='number' name='patentsum' value='$patentsum' /></p>";
			$html .= "<p>结题指标<textarea name='quota' style='margin-left:34px'>$quota</textarea></p>";
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>申请书</span><input type='file' name='application' /></p>";
			$html .= "<p><span>结题报告</span><input type='file' name='endReport'/></p>";
			$html .= "<p><span>计划书</span><input type='file' name='plan'/></p>";
			$html .= "<p><span>合同书</span><input type='file' name='contract'/></p>";
			$html .= "<p><span>验收证书</span><input type='file' name='acceptCert'/></p>";
		}
	} else {
		$html .= '查询详细项目信息失败：'.mysql_errno();
	}
	return $html;
}
?>