<?php $this->load->view("admin/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo css_path("admin")."login.css"; ?>"/>
	</head>
	<body>
		<form id="login_box" action="javascript:login()">
			<img id="img" alt="" src="data/admin/img/login_person.png" />
			<input type="text" id="username" placeholder="用户名" />
			<input type="password" id="password" placeholder="密码" />
			<button class="btn btn-success" id="submit">登录</button>
		</form>
		<p id="detail">Copyright 2013 | 南开大学社团联</p>
	</body>
<script type="text/javascript" src="<?php echo common_path()."jquery.js" ?>"></script>
<script type="text/javascript" src="<?php echo js_path("admin")."login.js"; ?>"></script>
</html>
