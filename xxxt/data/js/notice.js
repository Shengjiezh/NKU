var item = null;

$(document).ready(function() {
	$(".item_title").click(function() {
		var id = $(this).attr("id");
		var is_new = $(this).children().eq(2);
		if(is_new.hasClass("new_msg")) {
			$.post(_baseurl+"msg/action",{id:id, thing:"read_sysmsg"},function(data) {
				data = JSON.parse(data);
				if(!data['status']) {
					alert(data['error']);
				}
				else {
					is_new.html("");
					is_new.removeClass("new_msg");
				}
			});
		}
		if(item != null) {
			$("#"+item).removeClass("active_item");
			if(item == id) {
				$("#item_content_"+item).slideUp();
				item = null;
			}
			else {
				$(this).addClass("active_item");
				$("#item_content_"+item).slideUp(function() {$("#item_content_"+id).slideDown();});
				item = id;
			}
		}
		else {
			$(this).addClass("active_item");
			$("#item_content_"+id).slideDown();
			item = id;
		}
	});
});

function del_notice(id) {
	if(confirm("确认删除吗？删除之后不可恢复")) {
		$.post(_baseurl+"msg/action",{thing:"remove_sysmsg",id:id},function(data) {
			data = JSON.parse(data);
			if(!data['status']) {
				alert(data['error']);
			}
			else {
				$("#item_"+id).html("");
			}
		});
	}
}
