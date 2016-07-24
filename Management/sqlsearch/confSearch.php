<?php
function searchConf($html, $con) {
	$arrInfo = array();
	$sql = "select * from conference where";
	if(isset($_GET ['confName']))
	if ($_GET ['confName'] !== '') {
		$confName = $_GET ['confName'];
		$sql .= " and name='$confName'";
	}
	if(isset($_GET ['confAttendee']))
	if ($_GET ['confAttendee'] !== '') {
		$confAttendee = $_GET ['confAttendee'];
		$sql .= " and attendee like '%$confAttendee%'";
	}
	if(isset($_GET ['timeStart']))
	if ($_GET ['timeStart'] !== '') {
		$timeStart = $_GET ['timeStart'];
		$sql .= " and time >= $timeStart";
	}
	if(isset($_GET ['timeEnd']))
	if ($_GET ['timeEnd'] !== '') {
		$timeEnd = $_GET ['timeEnd'];
		$sql .= " and time < ($timeEnd+1)";
	}
	$sql = sqlSplit($sql);
	if (! ($res = mysql_query ( $sql ))) {
		echo "查询失败";
		exit ( 1 );
	}
	if($arr = mysql_fetch_array ( $res )) {
		$html .= getConfInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
		echo "<span>无此会议记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getConfInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo;
}