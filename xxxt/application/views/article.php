<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>article.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="shadow"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'article'; ?>">文章</a>
			</span>
			<div id="list_box">
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
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
        </ul>
        <p><a href="">首页</a><a href="">上一页</a><a href="">1</a><a href="">2</a><a href="">3</a><a href="">4</a><a href="">5</a><a href="">6</a><a href="">7</a><a href="">8</a><a href="">下一页</a><a href="">尾页</a></p>
</div>
<div class="article_list">
        <p><a href="">专辑题目</a></p>
        <ul>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
        </ul>
        <p><a>1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a><a>8</a><a>9</a><a>10</a><a>下一页</a><a>尾页</a></p>
</div>
<div class="article_list">
        <p><a href="">专辑题目</a></p>
        <ul>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
                <a href=""><li>某个文章的题目</li></a>
        </ul>
        <p><a>首页</a><a>上一页</a><a>1</a><a>2</a><a>3</a><a>4</a><a>5</a><a>6</a><a>7</a><a>8</a><a>下一页</a><a>尾页</a></p>
</div>
			</div>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
</html>
