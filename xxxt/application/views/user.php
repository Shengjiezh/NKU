<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>user.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'user'; ?>">个人</a>
			</span>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
	<script type="text/javascript" src="<?php echo js_path(); ?>user.js"></script>
</html>
