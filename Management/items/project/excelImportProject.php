<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$name = getCellValue($sheet,0,$j);
	$num = getCellValue($sheet,1,$j);
	$type = getCellValue($sheet,2,$j);
	$owner = getCellValue($sheet,3,$j);
	$cooper = getCellValue($sheet,4,$j);
	$host = getCellValue($sheet,5,$j);
	$sum = getCellValue($sheet,6,$j);
	$other = getCellValue($sheet,7,$j);
	$time = getCellValue($sheet,8,$j);
	$estabtime = getCellValue($sheet,9,$j);
	$quota = getCellValue($sheet,10,$j);
	$papersum = getCellValue($sheet,11,$j);
	$patentsum = getCellValue($sheet,12,$j);
	$sql = "INSERT INTO project(id, name, num, type, owner, cooper, host, sum, other, time, estabtime, quota, papersum, patentsum) VALUES('', '$name', '$num', '$type', '$owner', '$cooper', '$host', '$sum', '$other', '$time', '$estabtime', '$quota', '$papersum', '$patentsum')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertProjectPath($con, '', '', '', '', '', '', '', '', '', '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>