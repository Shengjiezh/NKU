<?php $this->load->view('block/header'); ?>
</head>
<body>
<h1>请登录</h1>
<h3>3秒后跳转到首页</h3>
</body>
<script>
	$(document).ready(function() {
		setTimeout(function() {self.location = _baseurl;}, 3000);
	});
</script>
</html>
