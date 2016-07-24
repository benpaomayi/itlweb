<?php
//修改论文信息
function alterPaperInfo($con, $id) {
	$firstauth = $_POST['firstauth'];
	$othauth = $_POST['othauth'];
	$comauth = $_POST['comauth'];
	$name = $_POST['name'];
	$journame = $_POST['journame'];
	$journum = $_POST['journum'];
	$page = $_POST['page'];
	$time = $_POST['time'];
	$adoptime = $_POST['adoptime'];
	$type = $_POST['type'];
	$projectnum = $_POST['projectnum'];
	$state = $_POST['state'];
	$sql = "UPDATE paper SET firstauth='$firstauth', othauth='$othauth', comauth='$comauth', name='$name', journame='$journame', journum='$journum', page='$page', time='$time', adoptime='$adoptime', type='$type', projectnum='$projectnum', state='$state' WHERE id='$id'";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		return false;
	} else {
		return true;
	}
}
//修改论文附件
function alterPaperFiles($con, $id, $path) {
	$sql = "SELECT * FROM paper_path WHERE paper_id='$id'";
	if($res = mysql_query($sql, $con)) {
		$arr = mysql_fetch_array($res);
	}
	$paperScan_name = $arr['paperscan_name'];
	$paperScan_path = $arr['paperscan_path'];
	$digitalOrg_name = $arr['digitalorg_name'];
	$digitalOrg_path = $arr['digitalorg_path'];
	$retrivalCert_name = $arr['retrivalcert_name'];
	$retrivalCert_path = $arr['retrivalcert_path'];
	if(!empty($_FILES['paperScan']['name'])) {
		$paperScan = $_FILES['paperScan'];
		deleteFile($paperScan_path);
		$paperScan_name = $paperScan['name'];
		$paperScan_path = uploadFiles($paperScan, $path);
		$sql = "UPDATE paper_path SET paperscan_name='$paperScan_name', paperscan_path='$paperScan_path' WHERE paper_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['digitalOrg']['name'])) {
		$digitalOrg = $_FILES['digitalOrg'];
		deleteFile($digitalOrg_path);
		$digitalOrg_name = $digitalOrg['name'];
		$digitalOrg_path = uploadFiles($digitalOrg, $path);
		$sql = "UPDATE paper_path SET digitalorg_name='$digitalOrg_name', digitalorg_path='$digitalOrg_path' WHERE paper_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	if(!empty($_FILES['retrivalCert']['name'])) {
		$retrivalCert= $_FILES['retrivalCert'];
		deleteFile($retrivalCert_path);
		$retrivalCert_name = $retrivalCert['name'];
		$retrivalCert_path = uploadFiles($retrivalCert, $path);
		$sql = "UPDATE paper_path SET retrivalcert_name='$retrivalCert_name', retrivalcert_path='$retrivalCert_path' WHERE paper_id='$id'";
		if(!mysql_query($sql, $con)) {
			return false;
		}
	}
	return true;
}
?>