<?php
//上传文件
function uploadFiles($file, $path) {
	// 上传文件的大小过滤
	if ($file['size'] > 20 * 1024 * 1024) {
		echo $file['name'].'  文件不能超过20M';
		exit(1);
	}
	// 上传文件名处理
	$exten_name = pathinfo ( $file['name'], PATHINFO_EXTENSION );
	do {
		$main_name = date ( 'YmdHis' . '--' . rand ( 100, 999 ) );
		$new_name = $main_name . '.' . $exten_name;
	} while ( file_exists ( $path . '/' . $new_name ) );
	// 判断是否是上传的文件，并执行上传
	if (is_uploaded_file ( $file['tmp_name'] )) {
		if (move_uploaded_file ( $file['tmp_name'], $path . '/' . $new_name )) {
			echo $file['name']. '  文件上传成功！<br>';
		} else {
			echo $file['name'] . '  上传文件移动失败！<br>';
		}
	} else {
		echo $file['name'] . '  文件超过20M或空文件！<br>';
		exit(1);
	}
	return $path.'/'.$new_name;
}
?>