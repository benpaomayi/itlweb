<?php
//显示项目附件
function showProjectFiles($id, $name, $con) {
	$html = '';
	$sqlSearchPath = "select * from project_path where project_id = $id";
	if ($resPath = mysql_query($sqlSearchPath, $con)) {
		while ($arrPath = mysql_fetch_array($resPath)) {
			$project_id = $arrPath['project_id'];
			$application_name = $arrPath['application_name'];
			$application_path = $arrPath['application_path'];
			$endReport_name = $arrPath['endreport_name'];
			$endReport_path = $arrPath['endreport_path'];
			$plan_name = $arrPath['plan_name'];
			$plan_path = $arrPath['plan_path'];
			$contract_name = $arrPath['contract_name'];
			$contract_path = $arrPath['contract_path'];
			$acceptCert_name = $arrPath['acceptcert_name'];
			$acceptCert_path = $arrPath['acceptcert_path'];
			if($application_name)
				$html .= "<p>申请书：<span data-path='$application_path'>$application_name</span></p>";
			else
				$html .= "<p>申请书：无</p>";
			if($endReport_name)
				$html .= "<p>结题报告：<span data-path='$endReport_path'>$endReport_name</span></p>";
			else 
				$html .= "<p>结题报告：无</p>";
			if($plan_name)
				$html .= "<p>计划书：<span data-path='$plan_path'>$plan_name</span></p>";
			else 
				$html .= "<p>计划书：无</p>";
			if($contract_path)
				$html .= "<p>合同书：<span data-path='$contract_path'>$contract_name</span></p>";
			else 
				$html .= "<p>合同书：无</p>";
			if($acceptCert_name)
				$html .= "<p>验收证书：<span data-path='$acceptCert_path'>$acceptCert_name</span></p>";
			else 
				$html .= "<p>验收证书：无</p>";
		}
	}
	return $html;
}
?>