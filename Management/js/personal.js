$(function(){
	$("#btn_psw").click(function(e){
		var psw01 = $("#psw01").val();
		var psw02 = $("#psw02").val();
		var url = "password/changepsw.php";
		if(psw01 == '' || psw02 == '') {
			alert("密码不能为空！");
			return;
		}
		if(psw01 !== psw02) {
			alert("两个密码不一致！");
		} else {
			$.post(url, {psw01: psw01, psw02: psw02}, function(data) {
				alert(data);
				location.reload();
			});
		}
	});
	$("#psw01, #psw02").keyup(function(e){
		if(e.keyCode == 13) {
			$("#btn_psw").click();
		}
	});
});
