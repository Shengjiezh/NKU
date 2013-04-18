<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>msg.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'msg'; ?>">私信</a>
			</span>
			<div id="msg_box">
				<div id="left">
					<?php $i = 0; for($i=0;$i<count($teachers);$i++) { ?>
					<p tag="<?php echo $i; ?>"><?php echo $teachers[$i]['nickname']; ?></p>
					<?php } ?>
				</div>
				<div id="right_outer"><div id="right"></div></div>
			</div>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
	<script type="text/javascript" src="<?php echo js_path(); ?>msg.js"></script>
</html>
