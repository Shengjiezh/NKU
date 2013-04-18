<?php $this->load->view("admin/header") ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url("application/views/admin/css/main.css") ?>"/>
		<script type="text/javascript" src="<?php echo base_url("application/views/admin/js/main.js") ?>"></script>
		<script type="text/javascript">
			var __url="<?php echo base_url() ?>";
		</script>
	</head>
	<body>
		<div id="top">
			<p>NKU社团联</p>
			<a>欢迎管理员 <?php echo $username ?></a>
			<a class="logout" href="<?php echo base_url("admin/logout") ?>">注销</a>
		</div>
		<div id="left">
			<div id="logo"></div>
			<ul>
				<li id="league_li" class="active"><a href="javascript:show_tag('league')">社团</a></li>
				<li id="college_li"><a href="javascript:show_tag('college')">依托单位</a></li>
				<li id="stl_li"><a href="javascript:show_tag('stl')">社团联</a></li>
				<li id="xtw_li"><a href="javascript:show_tag('xtw')">校团委</a></li>
				<li id="admin_li"><a href="javascript:show_tag('admin')">管理员</a></li>
			</ul>
		</div>
		<div id="league_box" class="right" style="display:block">
			<form class="form_box" action="javascript:create_league()">
				<p>添加社团帐号</p>
				<input type="text" value="用户名" class="input_box" id="create_league_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="text" value="密码" class="input_box" id="create_league_password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value='密码'}"/>
				<input type="text" value="社团名称" class="input_box" id="create_league_name" onfocus="if(value=='社团名称') {value=''}" onblur="if (value=='') {value='社团名称'}"/>
				<input type="submit" value="添加" class="submit_box"/>
			</form>
			<form class="form_box" action="javascript:delete_league()">
				<p>删除社团帐号</p>
				<input type="text" value="用户名" class="input_box" id="delete_league_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="submit" value="删除" class="submit_box"/>
			</form>
			<div class="list_box">
				<p>社团帐号列表</p>
<?php foreach($league as $var) { ?>
				<a class="league_detail" title="点击显示详细信息" href="javascript:show_detail(<?php echo $var['id'] ?>)"><?php echo $var['username']."(".$var['name'].")" ?></a>
<?php } ?>
			</div>
		</div>
		<div id="college_box" class="right">
			<form class="form_box" action="javascript:create_college()">
				<p>添加依托单位帐号</p>
				<input type="text" value="用户名" class="input_box" id="create_college_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="text" value="密码" class="input_box" id="create_college_password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value='密码'}"/>
				<input type="text" value="依托单位名称" class="input_box" id="create_college_name" onfocus="if(value=='依托单位名称') {value=''}" onblur="if (value=='') {value='依托单位名称'}"/>
				<input type="submit" value="添加" class="submit_box"/>
			</form>
			<form class="form_box" action="javascript:delete_college()">
				<p>删除依托单位帐号</p>
				<input type="text" value="用户名" class="input_box" id="delete_college_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="submit" value="删除" class="submit_box"/>
			</form>
			<div class="list_box">
				<p>依托单位帐号列表</p>
<?php foreach($college as $var) { ?>
				<a><?php echo $var['username']."(".$var['name'].")" ?></a>
<?php } ?>
			</div>
		</div>
		<div id="stl_box" class="right">
			<form class="form_box" action="javascript:create_stl()">
				<p>添加社团联帐号</p>
				<input type="text" value="用户名" class="input_box" id="create_stl_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="text" value="密码" class="input_box" id="create_stl_password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value='密码'}"/>
				<input type="submit" value="添加" class="submit_box"/>
			</form>
			<form class="form_box" action="javascript:delete_stl()">
				<p>删除社团联帐号</p>
				<input type="text" value="用户名" class="input_box" id="delete_stl_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="submit" value="删除" class="submit_box"/>
			</form>
			<div class="list_box">
				<p>社团联帐号列表</p>
<?php foreach($stl as $var) { ?>
				<a><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="xtw_box" class="right">
			<form class="form_box" action="javascript:create_xtw()">
				<p>添加校团委帐号</p>
				<input type="text" value="用户名" class="input_box" id="create_xtw_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="text" value="密码" class="input_box" id="create_xtw_password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value='密码'}"/>
				<input type="submit" value="添加" class="submit_box"/>
			</form>
			<form class="form_box" action="javascript:delete_xtw()">
				<p>删除校团委帐号</p>
				<input type="text" value="用户名" class="input_box" id="delete_xtw_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="submit" value="删除" class="submit_box"/>
			</form>
			<div class="list_box">
				<p>校团委帐号列表</p>
<?php foreach($xtw as $var) { ?>
				<a><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="admin_box" class="right">
			<form class="form_box" action="javascript:create_admin()">
				<p>添加管理员帐号</p>
				<input type="text" value="用户名" class="input_box" id="create_admin_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="text" value="密码" class="input_box" id="create_admin_password" onfocus="if(value=='密码') {value=''}" onblur="if (value=='') {value='密码'}"/>
				<input type="submit" value="添加" class="submit_box"/>
			</form>
			<form class="form_box" action="javascript:delete_admin()">
				<p>删除管理员帐号</p>
				<input type="text" value="用户名" class="input_box" id="delete_admin_username" onfocus="if(value=='用户名') {value=''}" onblur="if (value=='') {value='用户名'}"/>
				<input type="submit" value="删除" class="submit_box"/>
			</form>
			<div class="list_box">
				<p>管理员帐号列表</p>
<?php foreach($admin as $var) { ?>
				<a><?php echo $var['username'] ?></a>
<?php } ?>
			</div>
		</div>
		<div id="detail_box"></div>
		<div id="bottom">
			<hr />
			<a>Copyright 2012 | Powered by L</a>
		</div>
	</body>
</html>
