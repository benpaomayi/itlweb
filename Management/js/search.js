$(function(){
	//在查看详细信息页面移除“导出信息”按钮
	if(getUrlParam("id")) {
		$(".export").remove();
	}
    //显示详细信息
    $("table[name='searchInfo'] tr[data-type]").click(function(e){
        var url = "search.php?";
        var id = $(this).attr("id");
		var type = $(this).attr("data-type");
        location.href = url + "type=" + type + "&id=" + id;
    });
    //信息显示列表中点击“有”按钮，显示附件列表
    $("table[name='searchInfo'] td").find("span:eq(0)").click(function(e){
        var url = "search.php?";
        var id, name, type;
        id = $(this).attr("id").split("_")[1];
        name = $(this).parents("tr").children().get(0).innerHTML;
		type = $(this).parents("tr").attr("data-type");
		url = url + "id=" + id + "&name=" + name + "&type=" + type;
		location.href = url;
        //防止冒泡
        e.stopPropagation();
    });
    //下载附件
    $(".filelist span").click(function(e){
        var url = "download/download.php";
        var path = $(this).attr("data-path");
        location.href = url + "?path=" + path;
    });
    //点击项目信息中“论文指标数”列表中的论文名显示详细信息
    $("#projectInfoCorrel table").find("span").click(function(e){
        var id, type;
        id = $(this).attr("id").split("_")[1];
        type = "paper";
        showRelativeInfo(id, type);
    });
    
    //点击论文信息中“支撑项目”列表中的项目名显示详细信息
    $("#paperInfoCorrel table").find("span").click(function(e){
        var id, type;
        id = $(this).attr("id").split("_")[1];
        type = "project";
        showRelativeInfo(id, type);
    });
	//以txt文本方式导出信息
	$(".export img, .export span").click(function(e){
		var url = location.href;
		location.href = url + "&exportation=y";
	});
});
