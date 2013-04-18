<?php $this->load->view("user/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/user/css/main.css") ?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/user/css/right.css") ?>"/>
		<script src="<?php echo base_url("application/views/user/js/main.js") ?>"></script>
		<script>
			var __url="<?php echo base_url() ?>";
<?php if(isset($league)) { ?>
			var register=<?php echo $league['status'] ?>;
<?php } ?>
		</script>
	</head>
	<body>
		<div id="top">
			<p>NKU社团联</p>
			<?php
				switch($type){
					case 0:{echo "<a>欢迎社团 ".$username."</a>";break;}
					case 1:{echo "<a>欢迎依托单位 ".$username."</a>";break;}
					case 2:{echo "<a>欢迎社团联 ".$username."</a>";break;}
					case 3:{echo "<a>欢迎校团委 ".$username."</a>";break;}
				}
			?>
			<a class="logout" href="<?php echo base_url("user/logout") ?>">注销</a>
		</div>
		<div id="left">
			<div id="logo"></div>
			<ul>
<?php $this->load->view("user/left") ?>
			</ul>
		</div>
<?php $this->load->view("user/right") ?>
		<div id="bottom">
			<hr />
			<a>Copyright 2012 | Powered by L</a>
		</div>
	</body>
</html>
