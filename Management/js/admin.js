var isShow = false;
//显示扩展列表
function showExpandList() {
	var expanddiv = document.getElementById("expanddiv");
	if(isShow == false) {
		expanddiv.style.display = "block";
		isShow = true;
	} else if(isShow == true) {
		expanddiv.style.display = "none";
		isShow = false;
		}
	
}
//获取地址栏参数
function getUrlParam(name)
{
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); 
	var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	if (r!=null) return unescape(r[2]); return null; //返回参数值
} 
$(document).ready(function(e) {
	var li_id = getUrlParam("li_id");
	var navHeight;
	$("#groupList").children().css("background-color", "#f5f5f5");
	if(li_id == null) {
		li_id = "li_project";
        $("#li_project").css("background-color", "#DDDDDD");
	} else {
		var id_jquery = "#" + li_id;
		$(id_jquery).css("background-color", "#DDDDDD");	
	}
	//确定顶部导航条、图片框宽度
	$("#nav, #imgTop").width($(document).width());
	//确定id为wrapper的div宽度
	$("#wrapper").width($(document).width()-6);
	//确定扩展条的位置
	$("#expanddiv").css("left", $("#nav").width()-115+"px");
	//改变顶部导航条、图片框宽度,改变扩展条位置
	$(window).resize(function(e){
		$("#nav, #imgTop").width($(document).width());
		$("#wrapper").width($(document).width()-6);
		$("#expanddiv").css("left", $("#nav").width()-115+"px");
	});
	//左边导航条高度
	navHeight = $("#leftNav").height($(document).outerHeight() - 146);
	$("#leftNav").height(navHeight);
	//改变左边导航条高度
	$(window).resize(function(e){
		$("#leftNav").height($(document).outerHeight() - 146);
	});
	$(window).scroll(function(e){
//		$("#leftNav").height($(document).height() - 146);
	});
	//滑动显示扩展列表
	$("#expand").hover(function(e) {
        showExpandList();
    });
	$("#expanddiv").hover(function(e) {
        showExpandList();
    });

	//左边导航栏点击显示相关信息
    $("#groupList li").click(function(e) {
		var html = '';
		li_id = $(this).attr("id");
		$("#groupList").children().css("background-color", "#f5f5f5");
        $(this).css("background-color", "#DDDDDD");
		location.href = "admin.php?li_id=" + li_id + "&page=1";
		switch(li_id) {
			case "li_project": 
				li_id = "li_project";
				break;
			case "li_paper":
				li_id = "li_paper";
				break;
			case "li_patent":
				li_id = "li_patent";
				break;
			case "li_soft_cpr":
				li_id = "li_soft_cpr";
				break;
			case "li_conference":
				li_id = "li_conference";	
				break;
			case "li_rewards":
				li_id = "li_rewards";
				break;
			default:;
		}
});
 
	//查询信息
	$("#btn_search").click(function(e) {
		var url = "search.php?";
		switch(li_id) {
			case "li_project":
				url += "searchCondition=projectCondition&projectNum=" + $("#projectNum").val() +"&projectName=" + $("#projectName").val() + "&projectType=" + $("#projectType").val() + "&projectHost=" + $("#projectHost").val() + "&projectOther=" + $("#projectOther").val();
				break;
			case "li_paper":
				url += "searchCondition=paperCondition&paperName=" + $("#paperName").val() +"&paperAuth=" + $("#author").val() + "&paperFirstauth=" + $("#firstAuth").val()+ "&paperAnother=" + $("#another").val() + "&paperJournal=" + $("#journal").val();
				break;
			case "li_patent":
				url += "searchCondition=patentCondition&patentName=" + $("#patentName").val() + "&patentNum=" + $("#patentNum").val() + "&inventor=" + $("#inventor").val();
				break;
			case "li_soft_cpr":
				url += "searchCondition=softcprCondition&softcprName=" + $("#softcprName").val() +"&softcprOwner=" + $("#softcprOwner").val() + "&softcprAuth="  + $("#softcprAuth").val() + "&softcprNum=" + $("#softcprNum").val(); 
				break;
			case "li_conference":
				url += "searchCondition=confCondition&confName=" + $("#confName").val() + "&confAttendee=" + $("#confAttendee").val();
				break;
			case "li_rewards":
				url += "searchCondition=rewardCondition&rewardHonoree=" + $("#rewardHonoree").val() + "&rewardLevel=" + $("#rewardLevel").val() + "&rewardName=" + $("#rewardName").val() + "&rewardNum=" + $("#rewardNum").val();
				break;	
		}
		location.href = url;
    });
	//按回车键执行查询
	$("#searchCondition input[type='text']").keyup(function(e){
		if(e.keyCode == 13)
			$("#btn_search").click();
	});
	//综合搜索
	$("#btn_comsearch").click(function(e){
		url = "complexSearch.php";
		location.href = url;
	});

	//上传信息和附件
	$("#upload").click(function(e) {
		var actionUrl = "upload/infofileup.php";
		var locationUrl = location.href;
		var excelActionUrl = '';
		var html_info = "<div style='width:1300px'>";
		html_info += "<form name='formUpload' method='post' enctype='multipart/form-data' action='" + actionUrl + "'>";
		html_info += "<input type='hidden' name='MAX_FILE_SIZE' value='20971520' />";
        switch(li_id) {
			case "li_project": 
				html_info += "<input style='display:none' name='flag' type='text' value='project' />";
				html_info += "<p class='p_background'>项目信息</p>";
				html_info += "<p><span>名称</span><input type='text' name='name' />";
				html_info += "<span>编号</span><input type='text' name='num' /></p>";
		        html_info += "<p><span>类别</span><input type='text' name='type' />";
        		html_info += "<span>归属单位</span><input type='text' name='owner' />";
		        html_info += "<p><span>合作单位</span><input type='text' name='cooper' />";
        		html_info += "<span>主持人</span><input type='text' name='host' /></p>";
		        html_info += "<p><span>资助金额</span><input type='text' name='sum' /></p>";
        		html_info += "<p><span>其他参与人</span><input type='text' name='other' />(用英文逗号分隔)</p>";
		        html_info += "<p><span>起止时间</span><input type='text' name='time' />(如：2015.6)</p>";
				html_info += "<p><span>立项时间</span><input type='text' name='estabtime' />(如：2013.6-2015.6)</p>";
				html_info += "<p><span>所需论文数</span><input type='number' name='papersum' />";
				html_info += "<span>所需专利数</span><input type='number' name='patentsum' />";
        		html_info += "<p>结题指标<textarea style='margin-left:34px;' name='quota'></textarea></p>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>申请书</span><input type='file' name='application' /></p>";		
				html_info += "<p><span>结题报告</span><input type='file' name='endReport'/></p>";
				html_info += "<p><span>计划书</span><input type='file' name='plan'/></p>";
				html_info += "<p><span>合同书</span><input type='file' name='contract'/></p>";
				html_info += "<p><span>验收证书</span><input type='file' name='acceptCert'/></p>";
				break;
			case "li_paper":
				html_info += "<p class='p_background'>论文信息</p>";
				html_info += "<input style='display:none' name='flag' type='text' value='paper' />";
				html_info += "<p><span>第一作者</span><input type='text' name='firstauth' />";
				html_info += "<span>通讯作者</span><input type='text' name='comauth' /></p>";
				html_info += "<p><span>其他作者</span><input type='text' name='othauth' />(用英文逗号分隔)</p>";
		        html_info += "<p><span>论文名</span><input type='text' name='name' />";
        		html_info += "<span>刊物名称</span><input type='text' name='journame' /></p>";
				html_info += "<p><span>刊出时间</span><input type='text' name='time' />(如：2015.6)</p>";
				html_info += "<p><span>录用时间</span><input type='text' name='adoptime' />(如：2015.6)</p>";
        		html_info += "<p><span>页码</span><input type='text' name='page' />(如：p1-6)</p>";
		        html_info += "<p><span>刊物期号</span><input type='text' name='journum' />(期(卷))</p>";
        		html_info += "<span>刊物级别</span><input type='text' name='type' />";
		        html_info += "<p><span>所挂项目编号</span><input type='text' name='projectnum' />(用英文逗号分隔)</p>";
        		html_info += "<p><span>投稿状态</span><input type='text' name='state' /></p>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>纸质版扫描件</span><input type='file' name='paperScan' /></p>";
				html_info += "<p><span>电子版原件</span><input type='file' name='digitalOrg' /></p>";
				html_info += "<p><span>检索证明</span><input type='file' name='retrivalCert' /></p>";
				break;
			case "li_patent":
				html_info += "<input style='display:none' name='flag' type='text' value='patent' />";
				html_info += "<p class='p_background'>专利信息</p>";
				html_info += "<p><span>发明人</span><input type='text' name='inventor' />(用英文逗号分隔)</p>";
				html_info += "<p><span>专利名</span><input type='text' name='name' />";
       			html_info += "<span>专利权人</span><input type='text' name='owner' /></p>";
        		html_info += "<p><span>申请时间</span><input type='text' name='time' />(如：2015.6)</p>";
        		html_info += "<p><span>专利号</span><input type='text' name='num' />(如果没有授权则填申请号)</p>";
				html_info += "<p><span>是否授权</span><select name='state'><option value='是'>是</option><option value='否'>否</option></select>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>申请说明书</span><input type='file' name='appManual' /></p>";
				html_info += "<p><span>授权说明书</span><input type='file' name='authManual' /></p>";
				html_info += "<p><span>授权证书</span><input type='file' name='authCert' /></p>";
				break;
			case "li_soft_cpr":
				html_info += "<input style='display:none' name='flag' type='text' value='softcpr' />";
				html_info += "<p class='p_background'>软件著作权信息</p>";
				html_info += "<p><span>软件名</span><input type='text' name='name' />";
       			html_info += "<span>作者</span><input type='text' name='author' /></p>";
		        html_info += "<p><span>著作权人</span><input type='text' name='owner' /></p>";
        		html_info += "<p><span>申请时间</span><input type='text' name='time' />(如：2015.6)</p>";
		        html_info += "<p><span>著作权号</span><input type='text' name='num' /></p>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>申请书</span><input type='file' name='application' /></p>";
				html_info += "<p><span>登记证书</span><input type='file' name='registerCert' /></p>";
				break;
			case "li_conference":
				html_info += "<input style='display:none' name='flag' type='text' value='conference' />";
				html_info += "<p class='p_background'>会议信息</p>";
				html_info += "<p><span>会议名</span><input type='text' name='name' />";
       			html_info += "<span>地点</span><input type='text' name='position' /></p>";
		        html_info += "<p><span>参会人</span><input type='text' name='attendee' />(用英文逗号分隔)</p>";
        		html_info += "<p><span>时间</span><input type='text' name='time' />(如：2015.6)</p>";
		        html_info += "<p><span>主办单位</span><input type='text' name='unit' /></p>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>邀请函</span><input type='file' name='invitation' /></p>";
				html_info += "<p><span>注册回执</span><input type='file' name='receipt' /></p>";
				html_info += "<p><span>演讲材料</span><input type='file' name='speech' /></p>";
				break;
			case "li_rewards":
				html_info += "<input style='display:none' name='flag' type='text' value='reward' />";
				html_info += "<p class='p_background'>获奖信息</p>";
				html_info += "<p><span>名称</span><input type='text' name='name' /></p>";
        		html_info += "<p><span>获奖人</span><input type='text' name='honoree' />(用英文逗号分隔)</p>";
				html_info += "<p><span>类型</span><input type='text' name='type' />";
       			html_info += "<span>级别</span><input type='text' name='level' /></p>";
		        html_info += "<p><span>时间</span><input type='text' name='time' />(如：2015.6)</p>";
				html_info += "<p><span>证书号</span><input type='text' name='num' /></p>";
		        html_info += "<p class='p_background'>附件</p>";
				html_info += "<p><span>获奖证书</span><input type='file' name='rewardCert' /></p>";
				break;
			default:;
		}
		html_info += "<input type='text' name='locationUrl' style='display:none' value='" + locationUrl + "' />";
		html_info += "<input id='submit' type='image' src='img/submit.png'/>";
		html_info += "</form>";
		switch(li_id) {
			case "li_project":
				excelActionUrl = './items/project/excelImportProject.php';
				break;
			case "li_paper":
				excelActionUrl = './items/paper/excelImportPaper.php';
				break;
			case "li_patent":
				excelActionUrl = './items/patent/excelImportPatent.php';
				break;
			case "li_soft_cpr":
				excelActionUrl = './items/softcpr/excelImportSoftcpr.php';
				break;	
			case "li_conference":
				excelActionUrl = './items/conference/excelImportConf.php';
				break;
			case "li_rewards":
				excelActionUrl = './items/reward/excelImportRewd.php';
				break;
		}
		html_info += "<div class='div_excelImport'>";
		html_info += "<form id='formExcelImport' enctype='multipart/form-data' method='post' action=" + excelActionUrl + "><img id='img_excelImport' src='./img/filetypes/xls.png'/><span id='excelImport'>excel导入</span><input type='file' name='excelFile' />";
		html_info += "<input type='text' name='locationUrl' style='display:none' value='" + locationUrl + "' />";
		html_info += "</form></div></div>";
		$("#content").html(html_info);
		//第二列输入框距离左边的距离
		$("form[name='formUpload']>p>span:nth-child(3)").css("margin-left", "50px");
		$("form[name='formUpload']>p>span[class=remind]").css("margin-left", "0");
		//选中文件后自动提交
		$("input[name='excelFile']").change(function(e) {
			dialog();
            $('#formExcelImport').submit();
        });
    });	
	//弹出加载图片
	function dialog() {
		$html = "<div class='dialogBack'></div><div class='dialogCont'><img src='img/importing.gif'/></div>";
		var width, height;
		width = $(window).width();
		height = $(document).height();
		$("body").append($html);
		$(".dialogBack").width(width);
		$(".dialogBack").height(height);
		height = height/2 -100 + "px";
		width = width/2 - 100 + "px";
		$(".dialogCont").css("margin-top", height);
		$(".dialogCont").css("margin-left", width);
	}
	
	//信息显示列表中点击“有”按钮，显示附件列表
	$("#info td").find("span:eq(0)").click(function(e) {
		var url = "items/filesList.php";
		var type, id, name;
		switch(li_id) {
			case "li_project":
				type = "project";
				break;
			case "li_paper":
				type = "paper";
				break;
			case "li_patent":
				type = "patent";
				break;
			case "li_soft_cpr":
				type = "softcpr";
				break;
			case "li_conference":
				type = "conference";
				break;
			case "li_rewards":
				type = "reward";
				break;
			default:
				break;
		}
		id = $(this).attr("id").split("_")[1];
		name = $(this).parents("tr").children().get(0).innerHTML;
        $.post(url, {id:id, type:type, name:name}, function(data){
			$("#content").html(data);
			//下载附件
			$("#div_filelist span").click(function(e) {
				var url = "download/download.php";
				var path = $(this).attr("data-path");
				location.href = url + "?path=" + path;
			});
		});
		//防止冒泡
		e.stopPropagation(); 
    });
		
	//删除信息
	$("#info td img").click(function(e){
		var type = '';
		var url = '';
		var id = $(this).parents("tr").attr("id");
		switch(li_id) {
			case "li_project":
				url = "items/project/deleteProjectInfo.php";
				break;
			case "li_paper":
				url = "items/paper/deletePaperInfo.php";
				break;
			case "li_patent":
				url = "items/patent/deletePatentInfo.php";
				break;
			case "li_soft_cpr":
				url = "items/softcpr/deleteSoftcprInfo.php";
				break;
			case "li_conference":
				url = "items/conference/deleteConfInfo.php";
				break;
			case "li_rewards":
				url = "items/reward/deleteRewdInfo.php";
				break;
			default:
				break;
		}
		if(confirm("确定要删除该信息吗？")) 
		$.post(url, {id: id}, function(e){
			window.location.reload();
		});
		e.stopPropagation();
	});
	
	//显示详细信息
	$("#info tr:not('tr:eq(0)')").click(function(e) {
		var url = "items/adminDetailInfo.php";
		var id = $(this).attr("id");
		var type;
		switch(li_id) {
			case "li_project":
				type = "project";
				break;
			case "li_paper":
				type = "paper";
				break;
			case "li_patent":
				type = "patent";
				break;
			case "li_soft_cpr":
				type = "softcpr";
				break;
			case "li_conference":
				type = "conference";
				break;
			case "li_rewards":
				type = "reward";
				break;
			default:
				break;
		}
		$.post(url, {type: type, id: id}, function(data){
			$("#content").html(data);
			//改变左边导航条高度
			$("#leftNav").height($(document).outerHeight() - 146);
			//“修改信息”按钮事件
			$("#alterInfo").click(function(e) {
				alterInfo(type, id);
			});
			//下载附件
			$(".filelist span").click(function(e) {
				var url = "download/download.php";
				var path = $(this).attr("data-path");
				location.href = url + "?path=" + path;
			});
			//点击项目信息中“论文指标数”列表中的论文名显示详细信息
			$("#projectInfoCorrel table").find("span").click(function(e) {
				var id, type;
				id = $(this).attr("id").split("_")[1];
				type = "paper";
				showRelativeInfo(id, type);
 		    });
			
			//点击论文信息中“支撑项目”列表中的项目名显示详细信息
			$("#paperInfoCorrel table").find("span").click(function(e) {
				var id, type;
				id = $(this).attr("id").split("_")[1];
				type = "project";
				showRelativeInfo(id, type);
 		    });
		});
    });
	
	$("#logout").click(function(e){
		logout();
	});
});

//修改信息内容
	function alterInfo(type, id) {
		var url = "items/alteredTable.php";
		var selfUrl = location.href;
		$.post(url, {type: type, id: id, selfUrl: selfUrl}, function(data){
			$("#content").html(data);
			$("#div_alterInfo>form>p>span:nth-child(3)").css("margin-left", "50px");
		});
	}
//退出登录
	function logout() {
		var url = "./logout/logout.php";
		$.post(url,{logout: "logout"},function(data){
			location.href = "login.html";
		});
	}
//显示关联部分内容的详细信息
	function showRelativeInfo(id, type) {
		var url = "items/correlativeinfo.php";
		var type = type;
		$.post(url, {id:id, type:type}, function(data){
			$("#content").html(data);
		}); 
	}