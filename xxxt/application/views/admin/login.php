<?php $this->load->view("admin/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo admin_css_path(); ?>login.css"/>
	</head>
	<body>
		<form id="login" action="javascript:login()">
			<div id="img_box"></div>
			<input type="text" class="input_box" value="用户名" id="username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
			<input type="text" class="input_box" value="密码" id="password" onfocus="if(value=='密码') {value='';type='password';}" onblur="if (value=='') {value='密码';type='text';}"/>
			<input type="submit" class="submit_box" value="登录"/>
			<a>Copyright 2012 | Powered by L</a>
		</form>
	</body>
	<script type="text/javascript" src="<?php echo admin_js_path(); ?>login.js"></script>
</html>
