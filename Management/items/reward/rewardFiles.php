<?php
//显示获奖附件
function showRewdFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from reward_path where reward_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$reward_id = $arrPath['reward_id'];
			$rewardCert_name = $arrPath['rewardcert_name'];
			$rewardCert_path = $arrPath['rewardcert_path'];
			if($rewardCert_path)
				$html .= "<p>获奖证书：<span data-path='$rewardCert_path'>$rewardCert_name</span></p>";
			else 
				$html .= "<p>获奖证书：无</p>";
		}
	}
	return $html;
}
?>