<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$type = getCellValue($sheet,0,$j); 
	$level = getCellValue($sheet,1,$j);
	$name = getCellValue($sheet,2,$j);
	$honoree = getCellValue($sheet,3,$j);
	$time = getCellValue($sheet,4,$j);
	$num = getCellValue($sheet,5,$j);
	$sql = "INSERT INTO reward(id, type, level, name, honoree, time, num) VALUES('', '$type', '$level', '$name', '$honoree', '$time', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertRewdPath($con, '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>