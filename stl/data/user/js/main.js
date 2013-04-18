$(document).ready(function(){
	var temp=$(document).width()-200;
	$(".right").width(temp);
});

function show_hidden(x){
	if($(":checkbox").eq(x).attr("checked")=="checked"){
		$(".hidden").eq(x).slideDown();
	}else{
		$(".hidden").eq(x).slideUp();
	}
}

function show_tag(tag){
	if(typeof register!='undefined'){
		if(register!=2&&tag!="register"&&tag!="other"){if(register==0){alert("请先完成本学期的社团注册");}else{alert("请等待社团注册通过审批");}return;}
	}
	$(".active").removeClass("active");
	$(".right:visible").hide();
	$('#'+tag+'_box').show();
	$('#'+tag+'_li').addClass("active");
}

function select_all(tag){
	var ch=$("[name='"+tag+"_all']")[0].checked;
	$("[name='"+tag+"_one']").each(
		function(){$(this).attr("checked",ch);}
	);
}

function apply(tag){
	var id='';
	$("[name='"+tag+"_one']").each(
		function(){
			if($(this).attr("checked")=="checked"){id=id+$(this).val()+',';}
		}
	);
	if(id==""){alert("请选择要通过的项目");return;}
	var opinion=prompt("请填写审批意见","通过");
	if(opinion!=null){
		if(opinion==""){
			alert("请输入审批意见");
		}else{
			$.post(__url+"action/apply",{apply_id:id,opinion:opinion},function(data){
				if(data==true){location.reload();}else{alert(data);}
			});
		}
	}
}

function add_league_man(index){
	var box=$(".table_box_inner")[index];
	switch(index){
		case 0:
			var data="<input type='text' name='boss_name[]'/><input type='text' name='boss_duty[]'/><input type='text' name='boss_grade[]'/><input type='text' name='boss_college[]'/><input type='text' name='boss_cellphone[]'/>";
			break;
		case 1:
			var data="<input type='text' name='txy_name[]'/><input type='text' name='txy_duty[]'/><input type='text' name='txy_grade[]'/><input type='text' name='txy_college[]'/><input type='text' name='txy_cellphone[]'/>";
			break;
		case 2:
			var data="<input type='text' name='tzb_name[]'/><input type='text' name='tzb_duty[]'/><input type='text' name='tzb_grade[]'/><input type='text' name='tzb_college[]'/><input type='text' name='tzb_cellphone[]'/>";
			break;
		case 3:
			var data="<input type='text' name='teacher_name[]'/><input type='text' name='teacher_duty[]'/><input type='text' name='teacher_grade[]'/><input type='text' name='teacher_college[]'/><input type='text' name='teacher_cellphone[]'/>";
			break;
	}
	box.innerHTML+=data;
	
	var left=$("#left");
	var right=$(".right");
	left.height(left.height()+20);
	right.height(right.height()+20);
}
