<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$inventor = getCellValue($sheet,0,$j);
	$owner = getCellValue($sheet,1,$j);
	$name = getCellValue($sheet,2,$j);
	$time = getCellValue($sheet,3,$j);
	$state = getCellValue($sheet,4,$j);
	$num = getCellValue($sheet,5,$j);
	$sql = "INSERT INTO patent(id, inventor, owner, name, time, state, num) VALUES('', '$inventor', '$owner', '$name', '$time', '$state', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertPatentPath($con, '', '', '', '', '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>