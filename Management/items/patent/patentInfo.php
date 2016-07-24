<?php
//显示专利信息
function showPatentInfo($con,$li_id,$page,$html_head, $hrefPage) {
	$sql = "select count(*) from patent";
	$total = getRowsNum($sql);
	$allPages = intval($total/PAGESIZE);
	$lastPageRows = $total % PAGESIZE;
	$html = '';
	if($lastPageRows) {
		$allPages++;
	}
	$offset = PAGESIZE*($page-1);
	$sql = "select * from patent order by time desc limit $offset,".PAGESIZE;
	if($res = mysql_query($sql)) {
		while ($arr = mysql_fetch_array($res)) {
			$isFileExist = '';
			$id = $arr['id'];
			$inventor = $arr['inventor'];
			$owner = $arr['owner'];
			$name = $arr['name'];
			$time = $arr['time'];
			$state = $arr['state'];
			$num = $arr['num'];
			$sqlIsFileExist = "select * from patent_path where patent_id='$id'";
			if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
				while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
				if($arrIsFileExist['appmanual_name'] !== '' || $arrIsFileExist['authmanual_name'] !== '' || $arrIsFileExist['authcert_name'] !== '') {
					$isFileExist = '有';
				}
			} else {
				echo "无法查找出是否有附件";
				break;
			}
			$html .= "<tr id='$id'>";
			$html .= "<td>$name</td>";
			$html .= "<td>$inventor</td>";
			$html .= "<td>$owner</td>";
			$html .= "<td>$time</td>";
			$html .= "<td>$state</td>";
			$html .= "<td>$num</td>";
			$html .= "<td><span id='patentdown_$id' class='isFileExist'>$isFileExist</span><td>";
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