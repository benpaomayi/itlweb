<?php
//显示论文信息
function showPaperInfo($con,$li_id,$page,$html_head, $hrefPage) {
	$sql = "select count(*) from paper";
	$total = getRowsNum($sql);
	$allPages = intval($total/PAGESIZE);
	$lastPageRows = $total % PAGESIZE;
	$html = '';
	if($lastPageRows) {
		$allPages++;
	}
	$offset = PAGESIZE*($page-1);
	$sql = "select * from paper order by time desc limit $offset,".PAGESIZE;
	if($res = mysql_query($sql)) {
		while ($arr = mysql_fetch_array($res)) {
			$isFileExist = '';
			$id = $arr['id'];
			$firstauth = $arr['firstauth'];
			$othauth = $arr['othauth'];
			$comauth = $arr['comauth'];
			$name = $arr['name'];
			$journame = $arr['journame'];
			$journum = $arr['journum'];
			$startStopPage = $arr['page'];
			$time = $arr['time'];
			$adoptime = $arr['adoptime'];
			$type = $arr['type'];
			$projectnum = $arr['projectnum'];
			$state = $arr['state'];
			$sqlIsFileExist = "select * from paper_path where paper_id='$id'";
			if($resIsFileExist = mysql_query($sqlIsFileExist, $con)) {
				while($arrIsFileExist = mysql_fetch_array($resIsFileExist))
				if($arrIsFileExist['paperscan_name'] !== '' || $arrIsFileExist['digitalorg_name'] !== '' || $arrIsFileExist['retrivalcert_name'] !== '' ) {
					$isFileExist = '有';
				}
			} else {
				echo "无法查找出是否有附件";
				break;
			}
			$html .= "<tr id='$id'>";
			$html .= "<td>$name</td>";
			$html .= "<td>$firstauth,$othauth</td>";
			$html .= "<td>$journame</td>";
			$html .= "<td>$time</td>";
			$html .= "<td>$type</td>";
			$html .= "<td><span id='paperdown_$id' class='isFileExist'>$isFileExist</span><td>";
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