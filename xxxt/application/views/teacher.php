<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>teacher.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="shadow"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'teacher'; ?>">名师</a>
			</span>
			<div id="teacher_list">
				<?php foreach($teachers as $teacher) { ?>
				<div class="teacher_box">
					<img src="" alt="" />
					<p><?php echo $teacher['nickname']; ?></p>
					<p><?php echo $teacher['level']; ?></p>
					<p><?php echo $teacher['mail']; ?></p>
					<p><?php echo $teacher['phone'];  ?></p>
					<p><?php echo $teacher['ol_time']; ?></p>
					<span><?php echo $teacher['info']; ?></span>
					<a href="">私信</a>
					<a href="">预约</a>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
</html>
