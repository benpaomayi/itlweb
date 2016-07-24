<?php
function searchProject($html, $con) {
	$_SESSION['host'] = '';
	$_SESSION['other'] = '';
	$arrInfo = array();
	$sql = "select * from project where";
	if(isset($_GET ['projectNum']))
	if ($_GET ['projectNum'] !== '') {
		$projectNum = $_GET ['projectNum'];
		$sql .= " and num='$projectNum'";
	}
	if(isset($_GET ['projectName']))
	if ($_GET ['projectName'] !== '') {
		$projectName = $_GET ['projectName'];
		$sql .= " and name='$projectName'";
	}
	if(isset($_GET['projectAttendee']))
	if ($_GET ['projectAttendee'] !== '') {
		$projectAttendee = $_GET['projectAttendee'];
		$sql .= " and (host like '%$projectAttendee%' or other like '%$projectAttendee%')";
	}
	if(isset($_GET ['projectType']))
	if ($_GET ['projectType'] !== '') {
		$projectType = $_GET ['projectType'];
		$sql .= " and type='$projectType'";
	}
	if(isset($_GET ['projectHost']))
	if ($_GET ['projectHost'] !== '') {
		$projectHost = $_GET ['projectHost'];
		$sql .= " and host='$projectHost'";
		$_SESSION['host'] = 'host';
	}
	if(isset($_GET ['projectOther']))
	if ($_GET ['projectOther'] !== '') {
		$projectOther = $_GET ['projectOther'];
		$sql .= " and other like '%$projectOther%'";
		$_SESSION['other'] = 'other';
	}
	if(isset($_GET ['timeStart']))
	if ($_GET ['timeStart'] !== '') {
		$timeStart = $_GET ['timeStart'];
		$sql .= " and estabtime >= $timeStart";
	}
	if(isset($_GET ['timeEnd']))
	if ($_GET ['timeEnd'] !== '') {
		$timeEnd = $_GET ['timeEnd'];
		$sql .= " and estabtime < ($timeEnd+1)";
	}
	$sql = sqlSplit ( $sql );
	if (! ($res = mysql_query ( $sql ))) {
		echo "查询失败";
		exit ( 1 );
	}
	if ($arr = mysql_fetch_array ( $res )) {
		$html .= getProjectInfo ( $arr, $con );
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
		echo "<span>无此项目记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getProjectInfo ( $arr, $con );
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo;
}
?>