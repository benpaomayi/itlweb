<?php
require '../excelImport.php';
for ($j=2; $j<=$rows; $j++) {
	$firstauth = getCellValue($sheet,0,$j);
	$othauth = getCellValue($sheet,1,$j);
	$comauth = getCellValue($sheet,2,$j);
	$name = getCellValue($sheet,3,$j);
	$journame = getCellValue($sheet,4,$j);
	$journum = getCellValue($sheet,5,$j);
	$page = getCellValue($sheet,6,$j);
	$time = getCellValue($sheet,7,$j);
	$adoptime = getCellValue($sheet,8,$j);
	$type = getCellValue($sheet,9,$j);
	$projectnum = getCellValue($sheet,10,$j);
	$state = getCellValue($sheet,11,$j);
	$sql = "INSERT INTO paper(id, firstauth, othauth, comauth, name, journame, journum, page, time, adoptime, type, projectnum, state) VALUES('', '$firstauth', '$othauth', '$comauth', '$name', '$journame', '$journum', '$page', '$time', '$adoptime', '$type', '$projectnum', '$state')";
	if(!mysql_query($sql,$con)) {
		echo mysql_error();
		exit(1);
	}
	insertPaperPath($con, '', '', '', '', '', '', '');
} 
if(unlink($filePath))
	header("location:$locationUrl");
?>