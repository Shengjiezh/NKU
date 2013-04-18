$("#username").focus();

$(window).keydown(function(event) {
	if(event.keyCode == 13) {
		login();
	}
});

function login() {
	var username = $.trim($("#username").val());
	var password = $.trim($("#password").val());
	if(username == "" || password == "") {
		alert("请输入用户名和密码");
	} else {
		$.post(_baseurl+"ajax/admin", {"request":"login", "username":username, "password":password}, function(data) {
			data = JSON.parse(data);
			if(data['status']) {
				location.reload();
			}
			else {
				alert(data['error']);
			}
		});
	}
}
