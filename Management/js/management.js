$(function(){
	function altAddUser(url) {
		var name = $("#name").val();
		var psw01 = $("#psw01").val();
		var psw02 = $("#psw02").val();
		if(name == '' || psw01 == '' || psw02 == '') {
			alert("用户名或密码不能为空！");
			return;
		}
		if(psw01 !== psw02) {
			alert("两个密码不一致！");
		} else {
			$.post(url, {name: name, psw01: psw01, psw02: psw02}, function(data) {
				alert(data);
				location.reload();
			});
		}
	}
	$("#btn_adduser").click(function(e){
		url = "altadduser/adduser.php";
		altAddUser(url);
	});
	$("#btn_altpsw").click(function(e){
		url = "altadduser/altpsw.php";
		altAddUser(url);
	});
	$("#psw01, #psw02").keyup(function(e){
		if(e.keyCode == 13) {
			$("#btn_psw").click();
		}
	});
});
