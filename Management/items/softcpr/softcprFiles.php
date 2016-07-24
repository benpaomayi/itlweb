<?php
//显示软件著作权附件
function showSoftCprFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from softcpr_path where softcpr_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$softcpr_id = $arrPath['softcpr_id'];
			$registerCert_name = $arrPath['registercert_name'];
			$registerCert_path = $arrPath['registercert_path'];
			$application_name = $arrPath['application_name'];
			$application_path = $arrPath['application_path'];
			if($application_path)
				$html .= "<p>申请书：<span data-path='$application_path'>$application_name</span></p>";
			else 
				$html .= "<p>申请书：无</p>";
			if($registerCert_path)
				$html .= "<p>登记证书：<span data-path='$registerCert_path'>$registerCert_name</span></p>";
			else 
				$html .= "<p>登记证书：无</p>";
		}
	}
	return $html;
}
?>