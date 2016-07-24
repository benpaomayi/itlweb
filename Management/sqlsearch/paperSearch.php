<?php
function searchPaper($html, $con) {
	$arrInfo = array();
	$sql = "select * from paper where";
	if(isset($_GET ['paperName']))
	if ($_GET ['paperName'] !== '') {
		$paperName = $_GET ['paperName'];
		$sql .= " and name='$paperName'";
	}
	if(isset($_GET ['paperAuth']))
	if ($_GET ['paperAuth'] !== '') {
		$paperAuth = $_GET ['paperAuth'];
		$sql .= " and  (firstauth='$paperAuth' or othauth like '%$paperAuth%')";
	}
	if(isset($_GET ['paperFirstauth']) && isset($_GET ['paperAnother'])) {
		if($_GET ['paperFirstauth'] !== '' && $_GET ['paperAnother'] !== '') {
			$paperFirstauth = $_GET ['paperFirstauth'];
			$paperAnother = $_GET ['paperAnother'];
			$sql .= " and (firstauth='$paperFirstauth' or firstauth='$paperAnother')";
		} else {
			if(isset($_GET ['paperFirstauth']))
			if ($_GET ['paperFirstauth'] !== '') {
				$paperFirstauth = $_GET ['paperFirstauth'];
				$sql .= " and firstauth='$paperFirstauth'";
			}
			if(isset($_GET ['paperAnother']))
			if ($_GET ['paperAnother'] !== '') {
				$paperAnother = $_GET ['paperAnother'];
				$sql .= " and firstauth='$paperAnother'";
			}
		}
	}
	if(isset($_GET ['paperJournal']))
	if ($_GET ['paperJournal'] !== '') {
		$paperJournal = $_GET ['paperJournal'];
		$sql .= " and journame='$paperJournal'";
	}
	if(isset($_GET ['timeStart']))
	if ($_GET ['timeStart'] !== '') {
		$timeStart = $_GET ['timeStart'];
		$sql .= " and adoptime >= $timeStart";
	}
	if(isset($_GET ['timeEnd']))
	if ($_GET ['timeEnd'] !== '') {
		$timeEnd = $_GET ['timeEnd'];
		$sql .= " and adoptime < ($timeEnd+1)";
	}
	$sql = sqlSplit($sql);
 	if (! ($res = mysql_query ( $sql ))) {
		echo "查询失败";
		exit ( 1 );
	}
	if($arr = mysql_fetch_array ( $res )) {
		$html .= getPaperInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	} else {
		if(!isset($_GET['attendee']))
			echo "<span>无此论文记录！</span>";
		$html = '';
	}
	while ( $arr = mysql_fetch_array ( $res ) ) {
		$html .= getPaperInfo($arr, $con);
		$arrInfo['info'][] = $arr;
	}
	$arrInfo['html'] = $html;
	return $arrInfo; 
}