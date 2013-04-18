$(document).ready(function() {
	var arr = new Array('3','1','7','0','4','5','2','8','6');
	var time = 1000;
	arr.sort(function(a,b){return Math.random()>.5 ? -1 : 1;});
	$("#b"+arr[0]).fadeIn(time);$("#b"+arr[1]).fadeIn(time);$("#b"+arr[2]).fadeIn(time,function(){
		$("#b"+arr[3]).fadeIn(time);$("#b"+arr[4]).fadeIn(time);$("#b"+arr[5]).fadeIn(time,function(){
			$("#b"+arr[6]).fadeIn(time);$("#b"+arr[7]).fadeIn(time);$("#b"+arr[8]).fadeIn(time);
            $("#username").focus();
		});
	});
});

function login() {
	var username = $.trim($("#username").val());
	var password = $.trim($("#password").val());
	if(username == "" || password == "") {
		alert("请输入用户名和密码");
	} else {
		$.post(_baseurl+'ajax/account',{"request":"login", "username":username, "password":password},function(data) {
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
