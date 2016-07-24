<?php
//修改软件著作权信息
function alterSoftcprInfo($con, $id) {
	$owner = $_POST['owner'];
	$author = $_POST['author'];
	$name = $_POST['name'];
	$time = $_POST['time'];
	$num = $_POST['num'];
	$sql = "UPDATE softcpr SET owner='$owner', author='$author', name='$name', time='$time', num='$num'";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}

//修改软件著作权附件
function alterSoftCprFiles($con, $id, $path) {
	$sql = "SELECT * FROM softcpr_path WHERE softcpr_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$registerCert_name = $arr['registercert_name'];
	$registerCert_path = $arr['registercert_path'];
	$application_name = $arr['application_name'];
	$application_path = $arr['application_path'];
	if(!empty($_FILES['registerCert']['name'])) {
		$registerCert = $_FILES['registerCert'];
		deleteFile($registerCert_path);
		$registerCert_name = $registerCert['name'];
		$registerCert_path = uploadFiles($registerCert, $path);
		$sql = "UPDATE softcpr_path SET registercert_name='$registerCert_name', registercert_path='$registerCert_path' WHERE softcpr_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['application']['name'])) {
		$application = $_FILES['application'];
		deleteFile($application_path);
		$application_name = $application['name'];
		$application_path = uploadFiles($application, $path);
		$sql = "UPDATE softcpr_path SET application_name='$application_name', application_path='$application_path' WHERE softcpr_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>