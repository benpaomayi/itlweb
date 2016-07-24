<?php
//显示论文附件
function showPaperFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from paper_path where paper_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$paper_id = $arrPath['paper_id'];
			$paperScan_name = $arrPath['paperscan_name'];
			$paperScan_path = $arrPath['paperscan_path'];
			$digitalOrg_name = $arrPath['digitalorg_name'];
			$digitalOrg_path = $arrPath['digitalorg_path'];
			$retrivalCert_name = $arrPath['retrivalcert_name'];
			$retrivalCert_path = $arrPath['retrivalcert_path'];
			if($paperScan_path)
				$html .= "<p>纸质版扫描件：<span data-path='$paperScan_path'>$paperScan_name</span></p>";
			else 
				$html .= "<p>纸质版扫描件：无</p>";
			if($digitalOrg_path)
				$html .= "<p>电子版原件：<span data-path='$digitalOrg_path'>$digitalOrg_name</span></p>";
			else 
				$html .= "<p>电子版原件：无</p>";
			if($retrivalCert_path)
				$html .= "<p>检索证明：<span data-path='$retrivalCert_path'>$retrivalCert_name</span></p>";
			else 
				$html .= "<p>检索证明：无</p>";
		}
	}
	return $html;
}
?>