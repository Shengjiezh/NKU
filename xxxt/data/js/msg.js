var teacher = '0';

$(document).ready(function() {
	$("#left p").click(function() {
		var obj_this = $(this);
		var obj_old = $("#left p").eq(parseInt(teacher));
		var obj_right = $("#right");
		var tag = obj_this.attr("tag");

		if(tag != teacher) {
			obj_right.fadeOut(600, function() {
				obj_old.animate({"margin-right":"30px"}, 400, function() {
					obj_old.removeClass("active");
					obj_this.addClass("active");
					obj_this.animate({"margin-right":"0"}, 400, function() {
						obj_right.fadeIn(600);
					});
				});
			});
			teacher = tag;
		}
	});
});
