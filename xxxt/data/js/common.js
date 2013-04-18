var mail_check = false;
var nickname_check = false;
var pwd_check = false;
var username_check = false;

$(document).ready(function() {

console.log(window.performance);

	$("ul li").eq(_nav).addClass("active");
	$("#leftside").height($(this).height());
	$(".user_box :input").blur(function() {
		var type = $(this).attr("id");
		var value = $(this).val();
		var obj_pic = $("#"+type+"_pic");
		switch(type) {
			case "reg_username":
			case "login_username":
				var check_username = /^\d+$/;
				if(check_username.test(value)) {
					obj_pic.attr("src", "data/image/reg_1.png");
					username_check = true;
				}
				else {
					obj_pic.attr("src", "data/image/reg_0.png");
					username_check = false;
					$(".tip:visible").html("请输入学号");
				}
				break;
			case "reg_pwd":
			case "login_pwd":
				var check_pwd = /^[a-zA-Z0-9]{6,20}$/;
				if(check_pwd.test(value)) {
					obj_pic.attr("src", "data/image/reg_1.png");
					pwd_check = true;
				}
				else {
					obj_pic.attr("src", "data/image/reg_0.png");
					pwd_check = false;
					$(".tip:visible").html("请输入6-20位的密码，密码中不能包含特殊字符");
				}
				break;
			case "reg_nickname":
				var check_nickname = /^\w{2,20}$/;
				if(check_nickname.test(value)) {
					obj_pic.attr("src", "data/image/reg_1.png");
					nickname_check = true;
				}
				else {
					obj_pic.attr("src", "data/image/reg_0.png");
					nickname_check = false;
					$(".tip:visible").html("请输入2-20位的昵称，昵称中不能包含特殊字符");
				}
				break;
			case "reg_mail":
				var check_mail = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
				if(check_mail.test(value)) {
					obj_pic.attr("src", "data/image/reg_1.png");
					mail_check = true;
				}
				else {
					obj_pic.attr("src", "data/image/reg_0.png");
					mail_check = false;
					$(".tip:visible").html("请输入正确的邮箱地址");
				}
				break;
		}
	});
});

$(window).keydown(function(event) {
	if(event.keyCode == 13) {
		eval($(".user_box :visible").parent().prop("id")+"()");
	}
});

function show_user_box(action) {
	var obj_main = $("#"+action);
	var obj_shadow = $("#shadow");
	if(obj_main.css("display") == 'none') {
		obj_shadow.fadeIn('normal');
		obj_main.fadeIn('normal');
	}
	else {
		obj_main.fadeOut('normal');
		obj_shadow.fadeOut('normal');
		$("#"+action+" :input").val("");
		$("#"+action+" img").each(function() {$(this).attr("src", "data/image/reg_2.png");});
		$("#"+action+"_tip").html("");
	}
}

function register() {
	if(mail_check && username_check && pwd_check && nickname_check) {
		var username = $("#reg_username").val();
		var pwd = $("#reg_pwd").val();
		var mail = $("#reg_mail").val();
		var nickname = $("#reg_nickname").val();
		$.post(_baseurl+"ajax/user", {"request":"register", "username":username, "pwd":pwd, "mail":mail, "nickname":nickname}, function(data) {
			data = JSON.parse(data);
			if(data['status']) {
				show_user_box("register");
				refresh_nav();
			}
			else {
				$("#register_tip").html(data['error']);
			}
		});
	}
}

function login() {
	if(username_check && pwd_check) {
		var username = $("#login_username").val();
		var pwd = $("#login_pwd").val();
		$.post(_baseurl+"ajax/user", {"request":"login", "username":username, "pwd":pwd}, function(data) {
			data = JSON.parse(data);
			if(data['status']) {
				show_user_box("login");
				refresh_nav();
			}
			else {
				$("#login_tip").html(data['error']);
			}
		});
	}
}

function logout() {
	$.post(_baseurl+"ajax/user", {"request":"logout"}, function() {
		if(_nav > 3) {
			self.location = _baseurl;
		}
		else {
			refresh_nav();
		}
	});
}

function refresh_nav() {
	$.post(_baseurl+"ajax/user", {"request":"refresh_nav"}, function(data) {
		$("#nav").html(data);
	});
}
