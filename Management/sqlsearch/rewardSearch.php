<?php
function searchReward($html, $con) {
	$arrInfo = array();
	$sql = "select * from reward where";
	if(isset($_GET ['rewardType']))
	if ($_GET ['rewardType'] !== '') {
		$rewardType = $_GET ['rewardType'];
		$sql .= " and type='$rewardType'";
	}
	if(isset($_GET ['rewardLevel']))
	if ($_GET ['rewardLevel'] !== '') {
		$rewardLevel = $_GET ['rewardLevel'];
		$sql .= " and level='$rewardLevel'";
	}
	if(isset($_GET ['rewardName']))
	if ($_GET ['rewardName'] !== '') {
		$rewardName = $_GET ['rewardName'];
		$sql .= " and name='$rewardName'";
	}
	if(isset($_GET ['rewardNum']))
	if ($_GET ['rewardNum'] !== '') {
		$rewardNum = $_GET ['rewardNum'];
		$sql .= " and num='$rewardNum'";
	}
	if(isset($_GET ['rewardHonoree']))
	if ($_GET ['rewardHonoree'] !== '') {
		$rewardHonoree = $_GET ['rewardHonoree'];
		$sql .= " and honoree like '%$rewardHonoree%'";
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
		$html .= getRewardInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
		echo "<span>无此获奖记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getRewardInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo;
}