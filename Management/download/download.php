<?php
header ( "Content-type: text/html; charset=utf-8" );
if (isset($_GET['path'])) {
	$path = $_GET['path'];
	if(preg_match("/^.*documents.*$/", $path)) { //只能够下载documents文件夹中的文件
		download($path);
	} else {
		echo "无法下载！";
	}
}

function download($path) {
	$arr = explode("/", $path);
	$filename = $arr[count($arr) - 1];
	if (! file_exists ( $path )) { // 检查文件是否存在
		echo "文件找不到";
		exit ();
	} else {
		$file = fopen ( $path, "r" ); // 打开文件
		// 输入文件标签
 		Header ( "Content-type: application/octet-stream" );
 		Header ( "Accept-Ranges: bytes" );
 		Header ( "Accept-Length: " . filesize ( $path ) );
 		Header ( "Content-Disposition: attachment; filename=" . $filename );
		// 输出文件内容
		echo fread ( $file, filesize ( $path ) );
		fclose ( $file );
	}
}
?>