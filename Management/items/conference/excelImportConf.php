<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$name = getCellValue($sheet,0,$j); 
	$attendee = getCellValue($sheet,1,$j);
	$position = getCellValue($sheet,2,$j);
	$time = getCellValue($sheet,3,$j);
	$unit = getCellValue($sheet,4,$j);
	$sql = "INSERT INTO conference(id, name, attendee, position, time, unit) VALUES('', '$name', '$attendee', '$position', '$time', '$unit')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertConfPath($con, '', '', '', '', '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>