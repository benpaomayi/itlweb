<?php
function sqlSplit($sql) {
	$resSql = '';
	$sqlArr = explode ( "and", $sql, 2 );
	if (count ( $sqlArr ) > 1)
		$resSql = $sqlArr [0] . $sqlArr [1];
	return $resSql;
}
?>