<?php $this->load->view("header") ?>
    <link rel="stylesheet" type="text/css" href="data/css/login.css" />
</head>
<body>
	<form id="login_box" action="javascript:login()">
		<img id="img" alt="" src="data/img/login_person.png" />
		<input type="text" id="username" placeholder="用户名" />
		<input type="password" id="password" placeholder="密码" />
		<button class="btn btn-success" id="submit">登录</button>
	</form>
	<p id="detail">Copyright 2013 | 南开大学</p>
</body>
<script type="text/javascript" src="data/js/jquery.js"></script>
<script type="text/javascript" src="data/js/login.js""></script>
</html>
