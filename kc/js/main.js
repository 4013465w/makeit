$(document).ready(function() {
	$('#user_reg').on('click', function() {
		var user_mail = $('#user_mail').val();
		var user_name = $('#user_name').val();
		var user_pwd = $('#user_pwd').val();
		var user_pwd_two = $('#user_pwd_two').val();
		if (user_pwd_two != user_pwd) {
			alert('两次密码输入不一致，请重新输入');
			return 0;
		}
		if (!(user_mail && user_name && user_pwd)) {
			alert("请把数据输入完整");
			return 0;
		}
		var url="http://www.fddcn.cn/zuo/index.php/user/create_user/"+user_name+'/'+user_mail+'/'+user_pwd;
		$.ajax({
			url: url,
			type:'get',
			dataType: "json",
			data: {
			},
			cache: false,
			success: function(data) {
				alert("注册成功，请登录");
				location.href="login.html";
			},
			error: function(e) {
				alert("网络错误~~(>_<)~~");
			}
		});
	})
	
	$('#user_sub').on('click', function() {
		var user_mail = $('#user_mail').val();
		var user_pwd = $('#user_pwd').val();
		if (!(user_mail && user_pwd)) {
			alert("请把数据输入完整");
			return 0;
		}
	var url="http://www.fddcn.cn/zuo/index.php/user/login/"+user_mail+'/'+user_pwd;
		$.ajax({
			url: url,
			type:'get',
			dataType: "json",
			data: {
			},
			cache: false,
			success: function(data) {
				alert("登陆成功");
				location.href="http://yymm.fddcn.cn";
			},
			error: function(e) {
				alert("网络错误~~(>_<)~~");
			}
		});
	})
	
	
	
	
	
})