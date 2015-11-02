/*
 *全局变量
 */
_URL_ = '127.0.0.1/zuo/';
/*
 * 检查网络
 */
document.addEventListener("plusready", onPlusReady, false);

function onPlusReady() {
	document.addEventListener("netchange", onNetChange, false);
}

function onNetChange() {
		var nt = plus.networkinfo.getCurrentType();
		switch (nt) {
			case plus.networkinfo.CONNECTION_ETHERNET:
			case plus.networkinfo.CONNECTION_WIFI:
				break;
			case plus.networkinfo.CONNECTION_CELL2G:
			case plus.networkinfo.CONNECTION_CELL3G:
			case plus.networkinfo.CONNECTION_CELL4G:
				break;
			default:
				alert("断网了哦！");
				break;
		}
	}
	(function($, app) {
		/*
		 *ajax函数
		 */
		app.result = function(url, datas, loding) {
			mui.ajax(url, {
				data: datas,
				dataType: 'json', //服务器返回json格式数据
				type: 'post', //HTTP请求类型
				timeout: 5000, //超时时间设置为5秒；
				beforeSend: function() {
					if (loding) {
						plus.nativeUI.showWaiting(title, options);
					}
				},
				complete: function() {
					if (loding) {
						plus.nativeUI.closeWaiting();
					}
				},
				success: function(data) {
					//服务器返回响应，根据响应结果，分析是否登录成功； 
					return data;
				},
				error: function(xhr, type, errorThrown) {
					//异常处理；
					plus.nativeUI.toast("网络错误");
					console.log(type);
					return 0;
				}
			});
		}



		app.createState = function(name, callback) {
			var state = app.getState();
			state.account = name;
			state.token = "token123456789";
			app.setState(state);
			return callback();
		};

		/**
		 * 新用户注册
		 **/
		app.reg = function(regInfo, callback) {
			callback = callback || $.noop;
			regInfo = regInfo || {};
			regInfo.account = regInfo.account || '';
			regInfo.password = regInfo.password || '';
			if (regInfo.account.length < 5) {
				return callback('用户名最短需要 5 个字符');
			}
			if (regInfo.password.length < 6) {
				return callback('密码最短需要 6 个字符');
			}
			if (!checkEmail(regInfo.email)) {
				return callback('邮箱地址不合法');
			}
			var users = JSON.parse(localStorage.getItem('$users') || '[]');
			users.push(regInfo);
			localStorage.setItem('$users', JSON.stringify(users));
			return callback();
		};

		/**
		 * 获取当前状态
		 **/
		app.getState = function() {
			var stateText = localStorage.getItem('$state') || "{}";
			return JSON.parse(stateText);
		};

		/**
		 * 设置当前状态
		 **/
		app.setState = function(state) {
			state = state || {};
			localStorage.setItem('$state', JSON.stringify(state));
			//var settings = owner.getSettings();
			//settings.gestures = '';
			//owner.setSettings(settings);
		};

		var checkEmail = function(email) {
			email = email || '';
			return (email.length > 3 && email.indexOf('@') > -1);
		};

		/**
		 * 找回密码
		 **/
		app.forgetPassword = function(email, callback) {
			callback = callback || $.noop;
			if (!checkEmail(email)) {
				return callback('邮箱地址不合法');
			}
			return callback(null, '新的随机密码已经发送到您的邮箱，请查收邮件。');
		};

		/**
		 * 获取应用本地配置
		 **/
		app.setSettings = function(settings) {
			settings = settings || {};
			localStorage.setItem('$settings', JSON.stringify(settings));
		}

		/**
		 * 设置应用本地配置
		 **/
		app.getSettings = function() {
			var settingsText = localStorage.getItem('$settings') || "{}";
			return JSON.parse(settingsText);
		}
	}(mui, window.app = {}));