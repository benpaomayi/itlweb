<?php
//显示软件著作权信息
function showSoftCprInfo($con,$li_id,$page,$html_head, $hrefPage) {
	$sql = "select count(*) from softcpr";
	$total = getRowsNum($sql);
	$allPages = intval($total/PAGESIZE);
	$lastPageRows = $total % PAGESIZE;
	$html = '';
	if($lastPageRows) {
		$allPages++;
	}
	$offset = PAGESIZE*($page-1);
	$sql = "select * from softcpr order by time desc limit $offset,".PAGESIZE;
	if($res = mysql_query($sql)) {
		while ($arr = mysql_fetch_array($res)) {
			$isFileExist = '';
			$id = $arr['id'];
			$owner = $arr['owner'];
			$author = $arr['author'];
			$name = $arr['name'];
			$time = $arr['time'];
			$num = $arr['num'];
			$sqlIsFileExist = "select * from softcpr_path where softcpr_id='$id'";
			if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
				while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
				if($arrIsFileExist['registercert_name'] !== '' || $arrIsFileExist['application_name'] !== '') {
					$isFileExist = '有';
				}
			} else {
				echo "无法查找出是否有附件";
				break;
			}
			$html .= "<tr id='$id'>";
			$html .= "<td>$name</td>";
			$html .= "<td>$author</td>";
			$html .= "<td>$time</td>";
			$html .= "<td>$owner</td>";
			$html .= "<td>$num</td>";
			$html .= "<td><span id='softcprdown_$id' class='isFileExist'>$isFileExist</span><td>";
			if($_SESSION['username'] == 'admin') {
				$html .= "<td><img src='img/delete.png'></td>";
			}
			$html .= "</tr>";
		}
	}
	$html .= "</table><div class='btnTurn'>";
	if($page == 1 && $total > PAGESIZE) {
		$html .= "$page/$allPages";
		$nextPage = $page + 1;
		$html .= "<a id='nextPage' href='$hrefPage?li_id=$li_id&page=".$nextPage."'>下一页></a>";
	} elseif ($page < $allPages) {
		$prePage = $page - 1;
		$html .= "<a id='prePage' href='$hrefPage?li_id=$li_id&page=".$prePage."'><上一页</a>";
		$html .= "$page/$allPages";
		$nextPage = $page + 1;
		$html .= "<a id='nextPage' href='$hrefPage?li_id=$li_id&page=".$nextPage."'>下一页></a>";
	} elseif($page > 1) {
		$prePage = $page - 1;
		$html .= "<a id='prePage' href='$hrefPage?li_id=$li_id&page=".$prePage."'><上一页</a>";
		$html .= "$page/$allPages";
	}
	$html .= "</div>";
	echo $html_head.$html;
}
?>