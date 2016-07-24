<?php
//创建导出文件
function createFile($string, $path) {
	$fp = fopen ( $path, "w" );
	if (! fwrite ( $fp, $string )) {
		echo "写入失败";
	}
	fclose ( $fp );
}