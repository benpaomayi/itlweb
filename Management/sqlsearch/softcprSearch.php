<?php
function searchSoftcpr($html, $con) {
	$arrInfo = array();
	$sql = "select * from softcpr where";
	if(isset($_GET ['softcprName']))
	if ($_GET ['softcprName'] !== '') {
		$softcprName = $_GET ['softcprName'];
		$sql .= " and name='$softcprName'";
	}
	if(isset($_GET ['softcprOwner']))
	if ($_GET ['softcprOwner'] !== '') {
		$softcprOwner = $_GET ['softcprOwner'];
		$sql .= " and owner='$softcprOwner'";
	}
	if(isset($_GET ['softcprAuth']))
	if ($_GET ['softcprAuth'] !== '') {
		$softcprAuth = $_GET ['softcprAuth'];
		$sql .= " and author like '%$softcprAuth%'";
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
		$html .= getSoftcprInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
		echo "<span>无此软件著作权记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getSoftcprInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo;
}