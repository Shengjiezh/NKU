<div id="top">
	<a href=""><img src="" alt=""/></a>
	<div id="nav">
		<ul><?php $this->load->view("block/ajax_nav.php"); ?></ul>
	</div>
</div>
<div id="register" class="user_box">
	<p>注册</p>
	<i id="register_tip" class="tip"></i>
	<span><a>学号</a><input type="text" id="reg_username" /><img src="data/image/reg_2.png" alt="" id="reg_username_pic" /></span>
	<span><a>密码</a><input type="password" id="reg_pwd" /><img src="data/image/reg_2.png" alt="" id="reg_pwd_pic" /></span>
	<span><a>昵称</a><input type="text" id="reg_nickname" /><img src="data/image/reg_2.png" alt="" id="reg_nickname_pic" /></span>
	<span><a>邮箱</a><input type="text" id="reg_mail" /><img src="data/image/reg_2.png" alt="" id="reg_mail_pic" /></span>
	<a href="javascript:show_user_box('register')">取消</a>
	<a href="javascript:register()">确认</a>
</div>
<div id="login" class="user_box">
	<p>登录</p>
	<i id="login_tip" class="tip"></i>
	<span><a>学号</a><input type="text" id="login_username" /><img src="data/image/reg_2.png" alt="" id="login_username_pic" /></span>
	<span><a>密码</a><input type="password" id="login_pwd" /><img src="data/image/reg_2.png" alt="" id="login_pwd_pic" /></span>
	<a href="javascript:show_user_box('login')">取消</a>
	<a href="javascript:login()">确认</a>
</div>
