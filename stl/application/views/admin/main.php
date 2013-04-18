<?php $this->load->view("admin/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo css_path("admin")."main.css"; ?>"/>
	</head>
	<body>
		<div id="top">
			<p>NKU社团联</p>
			<a>欢迎管理员<?php echo $me['username']; ?></a>
			<a class="logout" href="javascript:logout()">注销</a>
		</div>
		<div id="left">
			<div id="logo"></div>
			<ul>
				<li><a class="active" tag="league">社团</a></li>
				<li><a tag="college">依托单位</a></li>
				<li><a tag="stl">社团联</a></li>
				<li><a tag="xtw">校团委</a></li>
				<li><a tag="admin">管理员</a></li>
			</ul>
		</div>
		<div id="league_box" class="right" style="display:block">
			<form class="form_box" action="javascript:create('league')">
				<p>添加社团帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="create_league_username" />
				<input type="text" placeholder="密码" class="input_box" id="create_league_password" />
				<input type="text" placeholder="社团名称" class="input_box" id="create_league_name" />
				<button class="btn btn-success">添加</button>
			</form>
			<form class="form_box" action="javascript:delete_league()">
				<p>删除社团帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="delete_league_username" />
				<button class="btn btn-success">删除</button>
			</form>
			<div id="league_list" class="list_box">
				<p>社团帐号列表</p>
<?php foreach($leagues as $var) { ?>
				<a class="detail" data-toggle="modal" href="#detail_box" data-id="<?php echo $var['id']; ?>" data-type="league"><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="college_box" class="right">
			<form class="form_box" action="javascript:create('college')">
				<p>添加依托单位帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="create_college_username" />
				<input type="text" placeholder="密码" class="input_box" id="create_college_password" />
				<input type="text" placeholder="依托单位名称" class="input_box" id="create_college_name" />
				<button class="btn btn-success">添加</button>
			</form>
			<form class="form_box" action="javascript:delete_college()">
				<p>删除依托单位帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="delete_college_username" />
				<button class="btn btn-success">删除</button>
			</form>
			<div class="list_box">
				<p>依托单位帐号列表</p>
<?php foreach($colleges as $var) { ?>
				<a class="detail" data-toggle="modal" href="#detail_box" data-id="<?php echo $var['id']; ?>" data-type="college"><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="stl_box" class="right">
			<form class="form_box" action="javascript:create('stl')">
				<p>添加社团联帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="create_stl_username" />
				<input type="text" placeholder="密码" class="input_box" id="create_stl_password" />
				<button class="btn btn-success">添加</button>
			</form>
			<form class="form_box" action="javascript:delete_stl()">
				<p>删除社团联帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="delete_stl_username" />
				<button class="btn btn-success">删除</button>
			</form>
			<div class="list_box">
				<p>社团联帐号列表</p>
<?php foreach($stls as $var) { ?>
				<a class="detail" data-toggle="modal" href="#detail_box" data-id="<?php echo $var['id']; ?>" data-type="stl"><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="xtw_box" class="right">
			<form class="form_box" action="javascript:create('xtw')">
				<p>添加校团委帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="create_xtw_username" />
				<input type="text" placeholder="密码" class="input_box" id="create_xtw_password" />
				<button class="btn btn-success">添加</button>
			</form>
			<form class="form_box" action="javascript:delete_xtw()">
				<p>删除校团委帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="delete_xtw_username" />
				<button class="btn btn-success">删除</button>
			</form>
			<div class="list_box">
				<p>校团委帐号列表</p>
<?php foreach($xtws as $var) { ?>
				<a class="detail" data-toggle="modal" href="#detail_box" data-id="<?php echo $var['id']; ?>" data-type="xtw"><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="admin_box" class="right">
			<form class="form_box" action="javascript:create('admin')">
				<p>添加管理员帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="create_admin_username" />
				<input type="text" placeholder="密码" class="input_box" id="create_admin_password" />
				<button class="btn btn-success">添加</button>
			</form>
			<form class="form_box" action="javascript:delete_admin()">
				<p>删除管理员帐号</p>
				<input type="text" placeholder="用户名" class="input_box" id="delete_admin_username" />
				<button class="btn btn-success">删除</button>
			</form>
			<div class="list_box">
				<p>管理员帐号列表</p>
<?php foreach($admins as $var) { ?>
				<a class="detail" data-toggle="modal" href="#detail_box" data-id="<?php echo $var['id']; ?>" data-type="admin"><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="bottom">
			<hr />
			<pre>Copyright 2013 南开大学社团联 | Powered by L</pre>
		</div>
        <form id="detail_box" class="modal hide fade" aria-labelledby="login_lable" aria-hidden="true"></form>
	</body>
<script type="text/javascript" src="<?php echo common_path()."jquery.js" ?>"></script>
<script type="text/javascript" src="<?php echo common_path()."bootstrap/js/bootstrap.min.js" ?>"></script>
<script type="text/javascript" src="<?php echo js_path("admin")."main.js"; ?>"></script>
</html>
