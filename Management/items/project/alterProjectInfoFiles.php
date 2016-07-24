<?php
//修改项目信息
function alterProjectInfo($con, $id) {
	$name = $_POST['name'];
	$num = $_POST['num'];
	$type = $_POST['type'];
	$owner = $_POST['owner'];
	$cooper = $_POST['cooper'];
	$host = $_POST['host'];
	$sum = $_POST['sum'];
	$other = $_POST['other'];
	$time = $_POST['time'];
	$estabtime = $_POST['estabtime'];
	$quota = $_POST['quota'];
	$papersum = $_POST['papersum'];
	$patentsum = $_POST['patentsum'];
	$sql = "UPDATE project  SET name='$name', num='$num', type='$type', owner='$owner', cooper='$cooper', host='$host', sum='$sum', other='$other', time='$time', estabtime='$estabtime', quota='$quota', papersum='$papersum', patentsum='$patentsum' WHERE id=$id";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}
//修改项目附件
function alterProjectFiles($con, $id, $path) {
	$sql = "SELECT * FROM project_path WHERE project_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$application_name = $arr['application_name'];
	$application_path = $arr['application_path'];
	$endReport_name = $arr['endreport_name'];
	$endReport_path = $arr['endreport_path'];
	$plan_name = $arr['plan_name'];
	$plan_path = $arr['plan_path'];
	$contract_name = $arr['contract_name'];
	$contract_path = $arr['contract_path'];
	$acceptCert_name = $arr['acceptcert_name'];
	$acceptCert_path = $arr['acceptcert_path'];
	if(!empty($_FILES['application']['name'])) {
		$application = $_FILES['application'];
		deleteFile($application_path);
		$application_name = $application['name'];
		$application_path = uploadFiles($application, $path);
		$sql = "UPDATE project_path SET application_name='$application_name', application_path='$application_path' WHERE project_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['endReport']['name'])) {
		$endReport = $_FILES['endReport'];
		deleteFile($endReport_path);
		$endReport_name = $endReport['name'];
		$endReport_path = uploadFiles($endReport, $path);
		$sql = "UPDATE project_path SET endreport_name='$endReport_name', endreport_path='$endReport_path' WHERE project_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['plan']['name'])) {
		$plan = $_FILES['plan'];
		deleteFile($plan_path);
		$plan_name = $plan['name'];
		$plan_path = uploadFiles($plan, $path);
		$sql = "UPDATE project_path SET plan_name='$plan_name', plan_path='$plan_path' WHERE project_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['contract']['name'])) {
		$contract = $_FILES['contract'];
		deleteFile($contract_path);
		$contract_name = $contract['name'];
		$contract_path = uploadFiles($contract, $path);
		$sql = "UPDATE project_path SET contract_name='$contract_name', contract_path='$contract_path' WHERE project_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['acceptCert']['name'])) {
		$acceptCert = $_FILES['acceptCert'];
		deleteFile($acceptCert_path);
		$acceptCert_name = $acceptCert['name'];
		$acceptCert_path = uploadFiles($acceptCert, $path);
		$sql = "UPDATE project_path SET acceptcert_name='$acceptCert_name', acceptcert_path='$acceptCert_path' WHERE project_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>