<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>block/flash.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>welcome.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="shadow"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<?php $this->load->view('block/flash'); ?>
		<div id="main">
			<div id="left">
				<div class="article_list">
				        <p><a href="">专辑题目</a></p>
        				<ul>
                				<a href=""><li>某个文章的题目</li></a>
                				<a href=""><li>某个文章的题目</li></a>
                				<a href=""><li>某个文章的题目</li></a>
                				<a href=""><li>某个文章的题目</li></a>
                				<a href=""><li>某个文章的题目</li></a>
                				<a href=""><li>某个文章的题目</li></a>
						<a href=""><li>某个文章的题目</li></a>
					</ul>
        				<p><a href="">more>></a></p>
				</div>
<div class="article_list">
        <p><a href="">专辑题目</a></p>
        <ul>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
        </ul>
        <p><a href="">more>></a></p>
</div>
<div class="article_list">
        <p><a href="">专辑题目</a></p>
        <ul>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
        </ul>
        <p><a href="">more>></a></p>
</div>
			</div>
			<div id="right">
				<div class="teacher_info">
					<img src="" alt="" />
					<p>姓名</p>
					<p>职务</p>
					<p>邮箱</p>
					<p>介介绍啊绍啊啊啊啊啊啊啊啊啊啊啊啊啊绍啊介绍啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
					<a href="">预约</a>
				</div>
				<div class="sep"></div>
				<div class="teacher_info">
					<img src="" alt="" />
					<p>姓名</p>
					<p>职务</p>
					<p>邮箱</p>
					<p>介绍啊介绍啊啊啊啊啊啊啊啊啊啊啊啊啊</p>
					<a href="">预约</a>
				</div>
			</div>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
	<script type="text/javascript" src="<?php echo js_path(); ?>block/flash.js"></script>
</html>
