<?php
//删除原件有附件
function deleteFile($path){
	if(file_exists($path)) {
		if (!unlink($path)) {
			echo "删除文件失败！";
		}
	}
}
?>