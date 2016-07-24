// JavaScript Document 
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
	$("#wrapper").width($(document).width() - 6);
	//确定扩展条的位置
	$("#expanddiv").css("left", $("#nav").width()-110+"px");
	//改变顶部导航条、图片框宽度,改变扩展条位置
	$(window).resize(function(e){
		$("#nav, #imgTop").width($(document).width());
		$("#wrapper").width($(document).width() - 6);
		$("#expanddiv").css("left", $("#nav").width()-110+"px");
	});
	//左边导航条高度
	navHeight = $(document).outerHeight() - 146;
	$("#leftNav").height(navHeight);
	//改变左边导航条高度
	$(window).resize(function(e){
		$("#leftNav").height($(document).outerHeight() - 146);
	});
	$(window).scroll(function(e){
//		$("#leftNav").height($(document).height() - 146);
	});
	//显示扩展列表
	$("#expand").hover(function(e) {
        showExpandList();
    });
	$("#expanddiv").hover(function(e) {
        showExpandList();
    });
	//按回车键执行查询
	$("#searchCondition input[type='text']").keyup(function(e){
		if(e.keyCode == 13)
			$("#btn_search").click();
	});  
	//左边导航栏点击显示相关信息
    $("#groupList li").click(function(e) {
		li_id = $(this).attr("id");
		$("#groupList").children().css("background-color", "#f5f5f5");
        $(this).css("background-color", "#DDDDDD");
		location.href = "user.php?li_id=" + li_id + "&page=1";
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



//根据选择列表中的选项显示相应的查找条件
	$("#select_search").change(function(e) {
		$("#searchCondition").children(this).css("display","none");
    	switch($(this).val()) {
			case "project":
				$("#projectCondition").css("display","block");
				break;
			case "paper":
				$("#paperCondition").css("display","block");
				break;
			case "patent":
				$("#patentCondition").css("display","block");
				break;
			case "softcpr":
				$("#softcprCondition").css("display","block");
				break;
			case "conference":
				$("#confCondition").css("display","block");
				break;
			case "reward":
				$("#rewardCondition").css("display","block");
				break;	
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
	//综合搜索
	$("#btn_comsearch").click(function(e){
		url = "complexSearch.php";
		location.href = url;
	});

	
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
	
	//显示详细信息
	$("#info tr:not('tr:eq(0)')").click(function(e) {
		var url = "items/userDetailInfo.php";
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
	
	//显示关联部分内容的详细信息
	function showRelativeInfo(id, type) {
		var url = "items/correlativeinfo.php";
		var type = type;
		$.post(url, {id:id, type:type, name:name}, function(data){
			$("#content").html(data);
		}); 
	}
	
	$("#logout").click(function(e){
		logout();	
	});
	//退出登录
	function logout() {
		var url = "./logout/logout.php";
		$.post(url,{logout: "logout"},function(data){
			location.href = "login.html";	
		});
	}
	
}); 
