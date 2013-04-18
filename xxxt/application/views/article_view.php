<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>article_view.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="shadow"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'article'; ?>">文章</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'article/'.$article['id']; ?>"><?php echo $article['title']; ?></a>
			</span>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
</html>
