<?php
$html = '';
if (! isset ( $_GET ['li_id'] )) {
	$li_id = 'li_project';
} else {
	$li_id = $_GET ['li_id'];
}
switch ($li_id) {
	case "li_project" :
		$li_id = "li_project";
		$html = '<div id="projectCondition">
					<span>编号</span> 
					<input id="projectNum" type="text" />
					<span>名称</span>
					<input id="projectName" type="text" />
					<span>类别</span>
					<input id="projectType" type="text" />
					<span>主持人</span>
					<input class="shortInput" id="projectHost" type="text" />
					<span>参与人</span>
					<input class="shortInput" id="projectOther" type="text" />
				</div>';
		break;
	case "li_paper" :
		$li_id = "li_paper";
		$html = '<div id="paperCondition">
					<span>名称</span>
					<input id="paperName" type="text" />
					<span>作者</span>
					<input id="author" type="text" />
					<span>第一作者</span>
					<input class="shortInput" id="firstAuth" type="text" />
					<span>or</span>
					<input class="shortInput" id="another" type="text" />
					<span>刊物名称</span>
					<input id="journal" type="text" />
				</div>';
		break;
	case "li_patent" :
		$li_id = "li_patent";
		$html = '<div id="patentCondition">
					<span>名称</span>
					<input id="patentName" type="text" />
					<span>专利号</span>
					<input id="patentNum" type="text" />
					<span>发明人</span>
					<input id="inventor" type="text" />
				</div>';
		break;
	case "li_soft_cpr" :
		$li_id = "li_soft_cpr";
		$html = '<div id="softcprCondition">
					<span>软件名</span>
					<input id="softcprName" type="text" />
					<span>著作权人</span>
					<input id="softcprOwner" type="text" />
					<span>作者</span>
					<input id="softcprAuth" type="text" />
					<span>著作权号</span>
					<input id="softcprNum" type="text" />
				</div>';
		break;
	case "li_conference" :
		$li_id = "li_conference";
		$html = '<div id="confCondition">
					<span>会议名</span>
					<input id="confName" type="text" />
					<span>参会人</span>
					<input id="confAttendee" type="text" />
				</div>';
		break;
	case "li_rewards" :
		$li_id = "li_rewards";
		$html = '<div id="rewardCondition">
					<span>获奖人</span>
					<input id="rewardHonoree" type="text" />
					<span>级别</span>
					<input id="rewardLevel" type="text" />
					<span>名称</span>
					<input id="rewardName" type="text" />
					<span>证书号</span>
					<input id="rewardNum" type="text" />
				</div>';
		break;
	default :
		break;
}
echo $html;