$(document).ready(function(){
	var temp=$(document).width()-200;
	$('#league_box').width(temp);
	$('#college_box').width(temp);
	$('#admin_box').width(temp);
	$('#stl_box').width(temp);
	$('#xtw_box').width(temp);
	$(".form_box").width(temp);
});

function show_tag(tag){
	$(".active").removeClass("active");
	$(".right:visible").hide();
	$('#'+tag+'_box').show();
	$('#'+tag+'_li').addClass("active");
}

function show_detail(id){
	var box=$("#detail_box");
	$.post(__url+"admin/action",{task:"get_league",id:id},function(data){
		data="<a class='close' href='javascript:hide_detail()'>x</a>"+data;
		box.html(data);
	});
	box.show();
}

function hide_detail(){
	var box=$("#detail_box");
	box.hide();
}

function create_league(){
	var username=$("#create_league_username").val();
	var password=$("#create_league_password").val();
	var name=$("#create_league_name").val();
	if(username=="用户名"||password=="密码"||name=="社团名称"){
		alert("请输入完整的社团帐号信息");
	}
	else{
		$.post(__url+"admin/action",{task:"create_league",username:username,password:password,league_name:name},function(data){alert(data);});
	}
}

function delete_league(){
	var username=$("#create_league_username").val();
	if(username=="用户名"){
		alert("请输入要删除的社团帐号");
	}
	else{
		$.post(__url+"admin/action",{task:"delete_league",username:username},function(data){alert(data);});
	}
}

function create_college(){
	var username=$("#create_college_username").val();
	var password=$("#create_college_password").val();
	var name=$("#create_college_name").val();
	if(username=="用户名"||password=="密码"||name=="社团名称"){
		alert("请输入完整的依托单位帐号信息");
	}
	else{
		$.post(__url+"admin/action",{task:"create_college",username:username,password:password,college_name:name},function(data){alert(data);});
	}
}

function delete_college(){
	var username=$("#delete_college_username").val();
	if(username=="用户名"){
		alert("请输入要删除的依托单位帐号");
	}
	else{
		$.post(__url+"admin/action",{task:"delete_college",username:username},function(data){alert(data);});
	}
}

function create_stl(){
	var username=$("#create_stl_username").val();
	var password=$("#create_stl_password").val();
	if(username=="用户名"||password=="密码"){
		alert("请输入完整的社团联帐号信息");
	}
	else{
		$.post(__url+"admin/action",{task:"create_stl",username:username,password:password},function(data){alert(data);});
	}
}

function delete_stl(){
	var username=$("#delete_stl_username").val();
	if(username=="用户名"){
		alert("请输入要删除的社团联帐号");
	}
	else{
		$.post(__url+"admin/action",{task:"delete_stl",username:username},function(data){alert(data);});
	}
}

function create_xtw(){
	var username=$("#create_xtw_username").val();
	var password=$("#create_xtw_password").val();
	if(username=="用户名"||password=="密码"){
		alert("请输入完整的校团委帐号信息");
	}
	else{
		$.post(__url+"admin/action",{task:"create_xtw",username:username,password:password},function(data){alert(data);});
	}
}

function delete_xtw(){
	var username=$("#delete_xtw_username").val();
	if(username=="用户名"){
		alert("请输入要删除的校团委帐号");
	}
	else{
		$.post(__url+"admin/action",{task:"delete_xtw",username:username},function(data){alert(data);});
	}
}

function create_admin(){
	var username=$("#create_admin_username").val();
	var password=$("#create_admin_password").val();
	if(username=="用户名"||password=="密码"){
		alert("请输入完整的管理员帐号信息");
	}
	else{
		$.post(__url+"admin/action",{task:"create_admin",username:username,password:password},function(data){alert(data);});
	}
}

function delete_admin(){
	var username=$("#create_admin_username").val();
	if(username=="用户名"){
		alert("请输入要删除的管理员帐号");
	}
	else{
		$.post(__url+"admin/action",{task:"delete_admin",username:username},function(data){alert(data);});
	}
}
