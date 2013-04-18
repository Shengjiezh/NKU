<?php $this->load->view("user/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo css_path("user"); ?>login.css"/>
	</head>
	<body>
		<div id="map">
			<div class="box" id="b0"></div>
			<div class="box" id="b1"></div>
			<div class="box" id="b2">
				<p>NKU社团联</p>
				<a>登录后你可以</a>
				<a>1.注册社团</a>
				<a>2.预约场地</a>
				<a>3.申请活动</a>
			</div>
			<div class="box" id="b3"></div>
			<div class="box" id="b4">
				<form action="javascript:login()">
					<div class="user_ico"></div>
					<input type="text" id="username" placeholder="用户名" />
					<input type="password" id="password" placeholder="密码 " />
					<button type="submit" class="btn btn-success">登录</button>
				</form>
			</div>
			<div class="box" id="b5"></div>
			<div class="box" id="b6">
				<a>Copyright 2012 | Powered by L</a>
			</div>
			<div class="box" id="b7"></div>
			<div class="box" id="b8"></div>
		</div>
	</body>
<script type="text/javascript" src="<?php echo common_path(); ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo js_path("user"); ?>login.js"></script>
</html>
