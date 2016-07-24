<?php
//显示会议附件
function showConfFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from conference_path where conference_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$conference_id = $arrPath['conference_id'];
			$invitation_name = $arrPath['invitation_name'];
			$invitation_path = $arrPath['invitation_path'];
			$receipt_name = $arrPath['receipt_name'];
			$receipt_path = $arrPath['receipt_path'];
			$speech_name = $arrPath['speech_name'];
			$speech_path = $arrPath['speech_path'];
			if($invitation_path)
				$html .= "<p>邀请函：<span data-path='$invitation_path'>$invitation_name</span></p>";
			else 
				$html .= "<p>邀请函：无</p>";
			if($receipt_path)
				$html .= "<p>注册回执：<span data-path='$receipt_path'>$receipt_name</span></p>";
			else 
				$html .= "<p>注册回执：无</p>";
			if($speech_path)
				$html .= "<p>演讲材料：<span data-path='$speech_path'>$speech_name</span></p>";
			else 
				$html .= "<p>演讲材料：无</p>";
		}
	}
	return $html;
}
?>