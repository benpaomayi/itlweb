$(function(){		
	if($.cookie("project") == 1) {
		$("#chk_project").attr("checked", "checked");
	}
	if($.cookie("paper") == 1) {
		$("#chk_paper").attr("checked", "checked");
	}
	if($.cookie("patent") == 1) {
		$("#chk_patent").attr("checked", "checked");
	}
	if($.cookie("softcpr") == 1) {
		$("#chk_softcpr").attr("checked", "checked");
	}
	if($.cookie("conference") == 1) {
		$("#chk_conference").attr("checked", "checked");
	}
	if($.cookie("reward") == 1) {
		$("#chk_reward").attr("checked", "checked");
	}
	selectCheckbox();		
    //选择需要查询的范围
    $(".select input[type='checkbox']").click(function(e){
        $(".condition").children().css("display", "none");
		var html = '';
		selectCheckbox();
		if ($("#chk_project").is(":checked")) {
			$.cookie("project","1");
        } else {
			$.cookie("project","0");
		}
        if ($("#chk_paper").is(":checked")) {
           	$.cookie("paper","1");
        } else {
			$.cookie("paper","0");	
		}
        if ($("#chk_patent").is(":checked")) {
            $.cookie("patent","1");
        } else {
			$.cookie("patent","0");	
		}
        if ($("#chk_softcpr").is(":checked")) {
           $.cookie("softcpr","1");
        } else {
			$.cookie("softcpr","0");
		}
        if ($("#chk_conference").is(":checked")) {
            $.cookie("conference","1");
        } else {
			$.cookie("conference","0");	
		}
        if ($("#chk_reward").is(":checked")) {
            $.cookie("reward","1");
        } else {
			$.cookie("reward","0");
		}
    });
    //执行查询
    $("#img_comsearch").click(function(e){
        var url = 'complexSearch.php?';
        var checkedNum = $("input[name='checkbox']:checked").length;
        if (checkedNum > 1) {
			if ($("#chk_project").is(":checked")) {
                    url += "project=1&projectAttendee="+$("#attendee").val();
                }
                else {
                    url += "project=0";
                }
                if ($("#chk_paper").is(":checked")) {
                    url += "&paper=1&paperAuth="+$("#attendee").val();
                }
                else {
                    url += "&paper=0";
                }
                if ($("#chk_patent").is(":checked")) {
                    url += "&patent=1&inventor="+$("#attendee").val();
                }
                else {
                    url += "&patent=0";
                }
                if ($("#chk_softcpr").is(":checked")) {
                    url += "&softcpr=1&softcprAuth="+$("#attendee").val();
                }
                else {
                    url += "&softcpr=0";
                }
                if ($("#chk_conference").is(":checked")) {
                    url += "&conference=1&confAttendee="+$("#attendee").val();
                }
                else {
                    url += "&conference=0";
                }
                if ($("#chk_reward").is(":checked")) {
                    url += "&reward=1&rewardHonoree="+$("#attendee").val();
                }
                else {
                    url += "&reward=0";
                }
				url += "&attendee=1";
        }
        else 
            if (checkedNum == 1) {
                if ($("#chk_project").is(":checked")) {
                    url += "project=1";
                    url += "&projectNum=" + $("#projectNum").val() + "&projectName=" + $("#projectName").val() + "&projectType=" + $("#projectType").val() + "&projectHost=" + $("#projectHost").val() + "&projectOther=" + $("#projectOther").val();
                }
                else {
                    url += "project=0";
                }
                if ($("#chk_paper").is(":checked")) {
                    url += "&paper=1";
                    url += "&paperName=" + $("#paperName").val() + "&paperAuth=" + $("#author").val() + "&paperFirstauth=" + $("#firstAuth").val() + "&paperAnother=" + $("#another").val() + "&paperJournal=" + $("#journal").val();
                }
                else {
                    url += "&paper=0";
                }
                if ($("#chk_patent").is(":checked")) {
                    url += "&patent=1";
                    url += "&patentName=" + $("#patentName").val() + "&patentNum=" + $("#patentNum").val() + "&inventor=" + $("#inventor").val();
                }
                else {
                    url += "&patent=0";
                }
                if ($("#chk_softcpr").is(":checked")) {
                    url += "&softcpr=1";
                    url += "&softcprName=" + $("#softcprName").val() + "&softcprOwner=" + $("#softcprOwner").val() + "&softcprAuth=" + $("#softcprAuth").val() + "&softcprNum=" + $("#softcprNum").val();
                }
                else {
                    url += "&softcpr=0";
                }
                if ($("#chk_conference").is(":checked")) {
                    url += "&conference=1";
                    url += "&confName=" + $("#confName").val() + "&confAttendee=" + $("#confAttendee").val();
                }
                else {
                    url += "&conference=0";
                }
                if ($("#chk_reward").is(":checked")) {
                    url += "&reward=1";
                    url += "&rewardType=" + $("#rewardType").val() + "&rewardLevel=" + $("#rewardLevel").val() + "&rewardName=" + $("#rewardName").val() + "&rewardNum=" + $("#rewardNum").val();
                }
                else {
                    url += "&reward=0";
                }
            }
        url += "&timeStart=" + $("#timeStart").val() + "&timeEnd=" + $("#timeEnd").val();
        location.href = url;
    });
	//按回车键执行查询
	$(".condition input[type='text']").keyup(function(e){
		if(e.keyCode == 13)
			$("#img_comsearch").click();
	});
	//表前两个td的宽度
	$("table[name='searchInfo'] tr td:nth-child(1), td:nth-child(2)").css("width", "200px");
	function selectCheckbox() {
		var checkedNum = $("input[name='checkbox']:checked").length;
		if (checkedNum == 1) {
			if ($("#chk_project").is(":checked")) {
				$("#projectCondition").css("display", "block");
			}
			if ($("#chk_paper").is(":checked")) {
				$("#paperCondition").css("display", "block");
			}
			if ($("#chk_patent").is(":checked")) {
				$("#patentCondition").css("display", "block");
			}
			if ($("#chk_softcpr").is(":checked")) {
				$("#softcprCondition").css("display", "block");
			}
			if ($("#chk_conference").is(":checked")) {
				$("#confCondition").css("display", "block");
			}
			if ($("#chk_reward").is(":checked")) {
				$("#rewardCondition").css("display", "block");
			}
			$("#div_time").css("display", "block");
			$("#img_comsearch").css("display", "block");
		}
		if (checkedNum > 1) {
			$("#moreCondition").css("display", "block");
			$("#img_comsearch").css("display", "block");
			$("#div_time").css("display", "block");
		}
	}
});
