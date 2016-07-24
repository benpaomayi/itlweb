<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$owner = getCellValue($sheet,0,$j);
	$author = getCellValue($sheet,1,$j);
	$name = getCellValue($sheet,2,$j);
	$time = getCellValue($sheet,3,$j);
	$num = getCellValue($sheet,4,$j);
	$sql = "INSERT INTO softcpr(id, owner, author, name, time, num) VALUES('', '$owner', '$author', '$name', '$time', '$num')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertSoftcprPath($con, '', '', '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>