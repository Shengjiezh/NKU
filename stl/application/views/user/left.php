<?php if($type==0){ ?>
				<li id="register_li" class="active"><a href="javascript:show_tag('register')">注册社团</a></li>
				<li id="benbu_li"><a href="javascript:show_tag('benbu')">申请本部活动</a></li>
				<li id="xiaoqu_li"><a href="javascript:show_tag('xiaoqu')">申请校区活动</a></li>
				<li id="large_li"><a href="javascript:show_tag('large')">申请大型活动</a></li>
				<li id="list_li"><a href="javascript:show_tag('list')">活动列表</a></li>
				<li id="other_li"><a href="javascript:show_tag('other')">Read Me</a></li>
<?php }else{ ?>
				<li id="register_li" class="active"><a href="javascript:show_tag('register')">审批注册</a></li>
				<li id="benbu_li"><a href="javascript:show_tag('benbu')">审批本部活动</a></li>
				<li id="xiaoqu_li"><a href="javascript:show_tag('xiaoqu')">审批校区活动</a></li>
				<li id="large_li"><a href="javascript:show_tag('large')">审批大型活动</a></li>
				<li id="other_li"><a href="javascript:show_tag('other')">Read Me</a></li>
<?php } ?>