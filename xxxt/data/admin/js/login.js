function login(url){
	var username=$("#username").val();
	var password=$("#password").val();
	if(username=="用户名" || password=="密码"){
		alert("请输入用户名和密码");
	}
	else{
		$.post(url+"ajax/admin",{"request":"login", username:username, password:password},function(data){
			data = JSON.parse(data);
			if(data['status']) {
			}
			else {
			}
		});
	}
}
