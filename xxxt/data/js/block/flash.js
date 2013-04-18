var index = 0;
var count = 3;
var flash_box = $(".flash");
var btn = $("#flash_button");

$(document).ready(function() {
	flash();
});

function flash() {
	btn.animate({top: "300px"}, 5000, function() {
		flash_box.eq(index).fadeOut('normal', function() {
			index = (index+1)%3;
			flash_box.eq(index).fadeIn('normal', function() {
				btn.css("top", "-40px");
				flash();
			});
		});
	});
}
