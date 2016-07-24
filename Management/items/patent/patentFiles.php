<?php
//显示专利附件
function showPatentFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from patent_path where patent_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$patent_id = $arrPath['patent_id'];
			$appManual_name = $arrPath['appmanual_name'];
			$appManual_path = $arrPath['appmanual_path'];
			$authManual_name = $arrPath['authmanual_name'];
			$authManual_path = $arrPath['authmanual_path'];
			$authCert_name = $arrPath['authcert_name'];
			$authCert_path = $arrPath['authcert_path'];
			if($appManual_path)
				$html .= "<p>申请说明书：<span data-path='$appManual_path'>$appManual_name</span></p>";
			else 
				$html .= "<p>申请说明书：无</p>";
			if($authManual_path)
				$html .= "<p>授权说明书：<span data-path='$authManual_path'>$authManual_name</span></p>";
			else 
				$html .= "<p>授权说明书：无</p>";
			if($authCert_path)
				$html .= "<p>授权证书：<span data-path='$authCert_path'>$authCert_name</span></p>";
			else 
				$html .= "<p>授权证书：无</p>";
		}
	}
	return $html;
}
?>