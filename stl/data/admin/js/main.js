$(document).ready(function() {
	var temp = $(document).width()-200;
	$('#league_box').width(temp);
	$('#college_box').width(temp);
	$('#admin_box').width(temp);
	$('#stl_box').width(temp);
	$('#xtw_box').width(temp);
	$(".form_box").width(temp);

	$("li a").click(function() {
		$(".active").removeClass("active");
		$(".right:visible").hide();
		$(this).addClass("active");
		$("#"+$(this).attr("tag")+"_box").show();
	});

    $(".detail").click(function() {
        $.post(_baseurl+"ajax/account", {"request":"detail", 'type':$(this).attr("data-type"), 'id':$(this).attr("data-id")}, function(data) {
            $("#detail_box").html(data);
        });
    });
});

function logout() {
	$.post(_baseurl+"ajax/admin", {"request":"logout"}, function() {location.reload();});
}

function create(type) {
	var username = $("#create_"+type+"_username").val(), pwd=$("#create_"+type+"_password").val(), name = '1';
	if(type=="league" || type=="college") {
		name = $("#create_"+type+"_name").val();
	}
	if(username == "" || password == "" || name == "") {
		alert("请输入完整的帐号信息");
	} else {
		$.post(_baseurl+"ajax/admin", {"request":"create", "type":type, "username":username, "password":pwd, "name":name}, function(data) {
			data = json.parse(data);
			if(data['status']) {
				$("#"+type+"_list").append("<a class='detail' title='点击显示详细信息' href='javascript:show_detail()'>"+name+"</a>");
			} else {
				alert(data['error']);
			}
		});
	}
}

function remove(type) {
	var username = $("#delete_"+type+"_username").val();
	if(username == "") {
		alert("请输入要删除的帐号");
	} else {
		$.post(_baseurl+"ajax/admin", {"request":"delete", "type":type, "username":username}, function(data) {
			data = json.parse(data);
			if(data['status']) {
				location.reload();
			}
			else {
				alert(data['error']);
			}
		});
	}
}
