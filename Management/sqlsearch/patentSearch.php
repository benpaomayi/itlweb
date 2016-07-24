<?php
function searchPatent($html, $con) {
	$arrInfo = array();
	$sql = "select * from patent where";
	if(isset($_GET ['patentName']))
	if ($_GET ['patentName'] !== '') {
		$patentName = $_GET ['patentName'];
		$sql .= " and name='$patentName'";
	}
	if(isset($_GET ['patentNum']))
	if ($_GET ['patentNum'] !== '') {
		$patentNum = $_GET ['patentNum'];
		$sql .= " and num='$patentNum'";
	}
	if(isset($_GET ['inventor']))
	if ($_GET ['inventor'] !== '') {
		$inventor = $_GET ['inventor'];
		$sql .= " and inventor like '%$inventor%'";
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
		$html .= getPatentInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
		echo "<span>无此专利记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getPatentInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo;
}