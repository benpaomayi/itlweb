<?php
//获取总信息数
function getRowsNum($sql) {
	$res = mysql_query($sql);
	$row = mysql_fetch_row($res);
	return $row[0];
}
?>