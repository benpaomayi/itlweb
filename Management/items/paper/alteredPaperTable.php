<?php
//显示论文修改详细信息
function showAlteredPaperInfo($con, $alterType, $id, $selfUrl) {
	$html = '';
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
			$html .= "<input name='alterType' type='hidden' value='$alterType'/>";
			$html .= "<input name='id' type='hidden' value='$id'/>";
			$html .= "<input name='url' type='hidden' value='$selfUrl'/>";
			$html .= "<p class='p_background'>论文信息</p>";
			$html .= "<p><span>第一作者</span><input type='text' name='firstauth' value='$firstauth' />";
			$html .= "<span>通讯作者</span><input type='text' name='comauth' value='$comauth' /></p>";
			$html .= "<p><span>其他作者</span><input type='text' name='othauth' value='$othauth' />(用英文逗号分隔)</p>";
			$html .= "<p><span>论文名</span><input type='text' name='name' value='$name' />";
			$html .= "<span>刊物名称</span><input type='text' name='journame' value='$journame' />";
			$html .= "<p><span>刊出时间</span><input type='text' name='time' value='$time' />(如：2015.6)</p>";
			$html .= "<p><span>录用时间</span><input type='text' name='adoptime' value='$adoptime' />(如：2015.6)</p>";
			$html .= "<p><span>页码</span><input type='text' name='page' value='$page' />(如：p1-6)</p>";
			$html .= "<p><span>刊物期号</span><input type='text' name='journum' value='$journum' />(期(卷))</p>";
			$html .= "<p><span>刊物级别</span><input type='text' name='type' value='$type' /></p>";
			$html .= "<p><span>所挂项目编号</span><input type='text' name='projectnum' value='$projectnum' />(用英文逗号分隔)</p>";
			$html .= "<p><span>投稿状态</span><input type='text' name='state' value='$state' /></p>";
			$html .= "<p class='p_background'>附件</p>";
			$html .= "<p><span>纸质版扫描件</span><input type='file' name='paperScan' /></p>";
			$html .= "<p><span>电子版原件</span><input type='file' name='digitalOrg' /></p>";
			$html .= "<p><span>检索证明</span><input type='file' name='retrivalCert' /></p>";
		}
	} else {
		$html .= '查询详细论文信息失败：'.mysql_errno();
	}
	return $html;
}
?>