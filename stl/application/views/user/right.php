		<div id="register_box" class="right" style="display:block">
<?php if($type==0) { ?>
	<?php if($league['status']==0) { ?>
			<form action="<?php echo base_url("action/register") ?>" enctype="multipart/form-data" method="post">
				<div class="text_box">
					<p>社团类型</p>
					<select name="type">
						<option value="0">公益类</option>
						<option value="1">科技类</option>
						<option value="2">学术类</option>
						<option value="3">综合类</option>
						<option valuee"4">文艺类</option>
						<option value="5">体育类</option>
					</select>
				</div>
				<div class="text_box">
					<p>依托单位</p>
					<select name="college">
						<?php foreach($college as $var) {echo "<option value ='".$var['id']."'>".$var['name']."</option>";} ?>
					</select>
				</div>
				<div class="text_box">
					<p>创建时间</p>
					<input type="date" name="creatime" class="input_box"/>
				</div>
				<div class="text_box">
					<p>联系邮箱</p>
					<input type="text" name="mail" class="input_box"/>
				</div>
				<div class="text_box">
					<p>注册时间</p>
					<input type="date" name="register_time" class="input_box"/>
				</div>
				<div class="text_box">
					<p>注册负责人</p>
					<input type="text" name="register_man" class="input_box"/>
				</div>
				<div class="text_box">
					<p>上学期工作总结</p>
					<input type="file" name="summary" class="file_box"/>
				</div>
				<div class="text_box">
					<p>本学期工作计划</p>
					<input type="file" name="plan" class="file_box"/>
				</div>
				<div class="textarea_box">
					<p>社团简介</p>
					<textarea name="intro"></textarea>
				</div>
				<div class="textarea_box">
					<p>社团宗旨</p>
					<textarea name="purpose"></textarea>
				</div>
				<div class="table_box">
					<p>社团负责人资料</p>
					<div class="table_box_inner">
						<input type="text" readonly="true" value="姓名"/>
						<input type="text" readonly="true" value="职务"/>
						<input type="text" readonly="true" value="年级"/>
						<input type="text" readonly="true" value="学院"/>
						<input type="text" readonly="true" value="联系电话"/>
						<input type='text' name='boss_name[]'/><input type='text' name='boss_duty[]'/><input type='text' name='boss_grade[]'/><input type='text' name='boss_college[]'/><input type='text' name='boss_cellphone[]'/>
					</div>
					<a href="javascript:add_league_man(0)" class="add">添加</a>
				</div>
				<div class="table_box">
					<p>社团通讯员资料</p>
					<div class="table_box_inner" name="json_tongxunyuan">
						<input type="text" readonly="true" value="姓名"/>
						<input type="text" readonly="true" value="职务"/>
						<input type="text" readonly="true" value="年级"/>
						<input type="text" readonly="true" value="学院"/>
						<input type="text" readonly="true" value="联系电话"/>
						<input type='text' name='txy_name[]'/><input type='text' name='txy_duty[]'/><input type='text' name='txy_grade[]'/><input type='text' name='txy_college[]'/><input type='text' name='txy_cellphone[]'/>
					</div>
					<a href="javascript:add_league_man(1)" class="add">添加</a>
				</div>
				<div class="table_box">
					<p>社团团支部资料</p>
					<div class="table_box_inner" name="json_tuanzhibu">
						<input type="text" readonly="true" value="姓名"/>
						<input type="text" readonly="true" value="职务"/>
						<input type="text" readonly="true" value="年级"/>
						<input type="text" readonly="true" value="学院"/>
						<input type="text" readonly="true" value="联系电话"/>
						<input type='text' name='tzb_name[]'/><input type='text' name='tzb_duty[]'/><input type='text' name='tzb_grade[]'/><input type='text' name='tzb_college[]'/><input type='text' name='tzb_cellphone[]'/>
					</div>
					<a href="javascript:add_league_man(2)" class="add">添加</a>
				</div>
				<div class="table_box">
					<p>社团指导老师资料</p>
					<div class="table_box_inner" name="json_teacher">
						<input type="text" readonly="true" value="姓名"/>
						<input type="text" readonly="true" value="职务"/>
						<input type="text" readonly="true" value="政治面貌"/>
						<input type="text" readonly="true" value="学院"/>
						<input type="text" readonly="true" value="联系电话"/>
						<input type='text' name='teacher_name[]'/><input type='text' name='teacher_duty[]'/><input type='text' name='teacher_grade[]'/><input type='text' name='teacher_college[]'/><input type='text' name='teacher_cellphone[]'/>
					</div>
					<a href="javascript:add_league_man(3)" class="add">添加</a>
				</div>
				<input type="submit" class="submit_box" value="注册"/>
			</form>
	<?php }else if($league['status']==1){ ?>
			<p>审批进度</p>
		<?php switch($apply['status']){case 0: ?>
			<a>依托单位审批中...</a>
		<?php break;case 1: ?>
			<a>依托单位审批通过,审批意见:<?php echo $apply['opinion_college'] ?></a>
			<a>社团联审批中...</a>
		<?php break;case 2: ?>
			<a>依托单位审批通过,审批意见:<?php echo $apply['opinion_college'] ?></a>
			<a>社团联审批通过,审批意见:<?php echo $apply['opinion_stl'] ?></a>
			<a>校团委审批中...</a>
		<?php break;} ?>
	<?php }else{ ?>
			<p>注册成功</p>
			<a>依托单位审批通过,审批意见:<?php echo $apply['opinion_college'] ?></a>
			<a>社团联审批通过,审批意见:<?php echo $apply['opinion_stl'] ?></a>
			<a>校团委审批通过,审批意见:<?php echo $apply['opinion_xtw'] ?></a>
	<?php } ?>
<?php }else{ ?>
			<form action="javascript:apply('register')">
				<ul>
					<li>
						<input type="checkbox" name="register_all" onclick="javascript:select_all('register')"/>
						<a>社团名称</a>
						<a>依托单位</a>
						<a>社团负责人</a>
						<a>指导老师</a>
						<a>注册负责人</a>
						<a>上学期总结</a>
						<a>本学期计划</a>
						<a>全部信息</a>
					</li>
					<hr />
	<?php foreach($apply_register as $var) { ?>
					<li>
						<input type="checkbox" name="register_one" value="<?php echo $var['id'] ?>"/>
						<a><?php echo $var['league_info']['name'] ?></a>
						<a><?php echo $var['league_info']['college'] ?></a>
						<a><?php
							$temp=json_decode($var['league_info']['json_boss']);
							echo $temp[0]->name;
						?></a>
						<a><?php
							$temp=json_decode($var['league_info']['json_teacher']);
							echo $temp[0]->name;
						?></a>
						<a><?php echo $var['league_info']['register_man'] ?></a>
						<a href="<?php echo base_url($var['league_info']['summary']) ?>">查看</a>
						<a href="<?php echo base_url($var['league_info']['plan']) ?>">查看</a>
						<a href="">查看</a>
					</li>
	<?php } ?>
				</ul>
				<input type="submit" class="apply_box" value="通过"/>
			</form>
<?php } ?>
		</div>
		<div id="benbu_box" class="right">
<?php if($type==0) { ?>
			<form action="<?php echo base_url("action/benbu") ?>" method="post">
				<div class="text_box">
					<p>活动名称</p>
					<input type="text" name="theme" class="input_box"/>
				</div>
				<div class="text_box">
					<p>主办单位</p>
					<input type="text" name="host_high" class="input_box"/>
				</div>
				<div class="text_box">
					<p>承办单位</p>
					<input type="text" name="host_low" class="input_box"/>
				</div>
				<div class="text_box">
					<p>举办时间</p>
					<input type="date" name="date" class="input_box"/>
				</div>
				<div class="text_box">
					<p>具体时段</p>
					<select name="time">
						<option value="上午">上午</option>
						<option value="下午">下午</option>
						<option value="晚上">晚上</option>
					</select>
				</div>
				<div class="text_box">
					<p>申请场地</p>
					<input type="text" name="location" class="input_box"/>
				</div>
				<div class="text_box">
					<p>负责人</p>
					<input type="text" name="chief" class="input_box"/>
				</div>
				<div class="text_box">
					<p>联系方式</p>
					<input type="text" name="chief_phone" class="input_box"/>
				</div>
				<div class="text_box">
					<p>资金来源</p>
					<input type="text" name="money_from" class="input_box"/>
				</div>
				<div class="text_box">
					<p>活动规模</p>
					<select name="scale">
						<option value="0-49人">0-49人</option>
						<option value="50-99人">50-99人</option>
						<option value="100-?人">100-?人</option>
					</select>
				</div>
				<div class="text_box">
					<p>所需设施</p>
					<input type="text" name="needs" class="input_box"/>
				</div>
				<div class="textarea_box">
					<p>宣传方案</p>
					<span>是否挂横幅<input type="checkbox" name="hengfu" onclick="javascript:show_hidden(0)"/></span>
					<div class="hidden">
						<input type="text" name="hengfu_content" class="input_box" value="横幅内容" onfocus="if(value=='横幅内容'){value='';}" onblur="if(value==''){value='横幅内容';}"/>
						<input type="text" name="hengfu_time" class="input_box" value="悬挂时间" onfocus="if(value=='悬挂时间'){value='';}" onblur="if(value==''){value='悬挂时间';}"/>
						<input type="text" name="hengfu_location" class="input_box" value="悬挂地点" onfocus="if(value=='悬挂地点'){value='';}" onblur="if(value==''){value='悬挂地点';}"/>
					</div>
					<span>是否贴海报<input type="checkbox" name="haibao" onclick="javascript:show_hidden(1)"/></span>
					<div class="hidden">
						<input type="text" name="haibao_content" class="input_box" value="海报内容" onfocus="if(value=='海报内容'){value='';}" onblur="if(value==''){value='海报内容';}"/>
						<input type="text" name="haibao_time" class="input_box" value="悬挂时间" onfocus="if(value=='悬挂时间'){value='';}" onblur="if(value==''){value='悬挂时间';}"/>
						<input type="text" name="haibao_location" class="input_box" value="悬挂地点" onfocus="if(value=='悬挂地点'){value='';}" onblur="if(value==''){value='悬挂地点';}"/>
					</div>
				</div>
				<div class="textarea_box">
					<p>活动内容简介</p>
					<textarea name="intro"></textarea>
				</div>
				<input type="submit" class="submit_box" value="申请"/>
			</form>
<?php }else{ ?>
			<form action="javascript:apply('benbu')">
				<ul>
					<li>
						<input type="checkbox" name="benbu_all" onclick="javascript:select_all('benbu')"/>
						<a>活动名称</a><a>主办单位</a><a>承办单位</a><a>举办时间</a><a>申请场地</a><a>宣传方案</a><a>负责人</a><a>内容简介</a><a>全部信息</a>
					</li>
					<hr />
	<?php foreach($apply_benbu as $var) { ?>
					<li>
						<input type="checkbox" name="benbu_one" value="<?php echo $var['id'] ?>"/>
						<a><?php echo $var['activity']['theme'] ?></a>
						<a><?php echo $var['activity']['host_high'] ?></a>
						<a><?php echo $var['activity']['host_low'] ?></a>
						<a><?php echo $var['activity']['date'].$var['activity']['time'] ?></a>
						<a><?php echo $var['activity']['location'] ?></a>
						<a href="">查看</a>
						<a><?php echo $var['activity']['chief'] ?></a>
						<a><?php echo $var['activity']['intro'] ?></a>
						<a href="">查看</a>
					</li>
	<?php } ?>
				</ul>
				<input type="submit" class="apply_box" value="通过"/>
			</form>
<?php } ?>
		</div>
		<div id="xiaoqu_box" class="right">
<?php if($type==0) { ?>
			<form action="<?php echo base_url("action/xiaoqu") ?>" method="post">
				<div class="text_box">
					<p>活动名称</p>
					<input type="text" name="theme" class="input_box"/>
				</div>
				<div class="text_box">
					<p>主办单位</p>
					<input type="text" name="host_high" class="input_box"/>
				</div>
				<div class="text_box">
					<p>承办单位</p>
					<input type="text" name="host_low" class="input_box"/>
				</div>
				<div class="text_box">
					<p>举办时间</p>
					<input type="date" name="date" class="input_box"/>
				</div>
				<div class="text_box">
					<p>具体时段</p>
					<select name="time">
						<option value="上午">上午</option>
						<option value="下午">下午</option>
						<option value="晚上">晚上</option>
					</select>
				</div>
				<div class="text_box">
					<p>申请场地</p>
					<input type="text" name="location" class="input_box"/>
				</div>
				<div class="text_box">
					<p>负责人</p>
					<input type="text" name="chief" class="input_box"/>
				</div>
				<div class="text_box">
					<p>联系方式</p>
					<input type="text" name="chief_phone" class="input_box"/>
				</div>
				<div class="text_box">
					<p>资金来源</p>
					<input type="text" name="money_from" class="input_box"/>
				</div>
				<div class="text_box">
					<p>活动规模</p>
					<select name="scale">
						<option value="0-49人">0-49人</option>
						<option value="50-99人">50-99人</option>
						<option value="100-?人">100-?人</option>
					</select>
				</div>
				<div class="text_box">
					<p>所需设施</p>
					<input type="text" name="needs" class="input_box"/>
				</div>
				<div class="textarea_box">
					<p>宣传方案</p>
					<span>是否挂横幅<input type="checkbox" name="hengfu" onclick="javascript:show_hidden(2)"/></span>
					<div class="hidden">
						<input type="text" name="hengfu_content" class="input_box" value="横幅内容" onfocus="if(value=='横幅内容'){value='';}" onblur="if(value==''){value='横幅内容';}"/>
						<input type="text" name="hengfu_time" class="input_box" value="悬挂时间" onfocus="if(value=='悬挂时间'){value='';}" onblur="if(value==''){value='悬挂时间';}"/>
						<input type="text" name="hengfu_location" class="input_box" value="悬挂地点" onfocus="if(value=='悬挂地点'){value='';}" onblur="if(value==''){value='悬挂地点';}"/>
					</div>
					<span>是否贴海报<input type="checkbox" name="haibao" onclick="javascript:show_hidden(3)"/></span>
					<div class="hidden">
						<input type="text" name="haibao_content" class="input_box" value="海报内容" onfocus="if(value=='海报内容'){value='';}" onblur="if(value==''){value='海报内容';}"/>
						<input type="text" name="haibao_time" class="input_box" value="悬挂时间" onfocus="if(value=='悬挂时间'){value='';}" onblur="if(value==''){value='悬挂时间';}"/>
						<input type="text" name="haibao_location" class="input_box" value="悬挂地点" onfocus="if(value=='悬挂地点'){value='';}" onblur="if(value==''){value='悬挂地点';}"/>
					</div>
				</div>
				<div class="textarea_box">
					<p>活动内容简介</p>
					<textarea name="intro"></textarea>
				</div>
				<input type="submit" class="submit_box" value="申请"/>
			</form>
<?php }else{ ?>
			<form action="javascript:apply('xiaoqu')">
				<ul>
					<li>
						<input type="checkbox" name="xiaoqu_all" onclick="javascript:select_all('xiaoqu')"/>
						<a>活动名称</a><a>主办单位</a><a>承办单位</a><a>举办时间</a><a>申请场地</a><a>宣传方案</a><a>负责人</a><a>内容简介</a><a>全部信息</a>
					</li>
					<hr />
	<?php foreach($apply_xiaoqu as $var) { ?>
					<li>
						<input type="checkbox" name="xiaoqu_one" value="<?php echo $var['id'] ?>"/>
						<a><?php echo $var['activity']['theme'] ?></a>
						<a><?php echo $var['activity']['host_high'] ?></a>
						<a><?php echo $var['activity']['host_low'] ?></a>
						<a><?php echo $var['activity']['date'].$var['activity']['time'] ?></a>
						<a><?php echo $var['activity']['location'] ?></a>
						<a href="">查看</a>
						<a><?php echo $var['activity']['chief'] ?></a>
						<a><?php echo $var['activity']['intro'] ?></a>
						<a href="">查看</a>
					</li>
	<?php } ?>
				</ul>
				<input type="submit" class="apply_box" value="通过"/>
			</form>
<?php } ?>
		</div>
		<div id="large_box" class="right">
<?php if($type==0) { ?>
			<form action="<?php echo base_url("action/large") ?>" method="post">
				<div class="text_box">
					<p>主办院系</p>
					<select name="college">
						<option value="法学院">法学院</option>
						<option value="商学院">商学院</option>
						<option value="文学院">文学院</option>
						<option value="医学院">医学院</option>
						<option value="药学院">药学院</option>
						<option value="哲学院">哲学院</option>
						<option value="化学学院">化学学院</option>
						<option value="历史学院">历史学院</option>
						<option value="经济学院">经济学院</option>
						<option value="数学学院">数学学院</option>
						<option valuee"物理学院">物理学院</option>
						<option valuee"软件学院">软件学院</option>
						<option valuee"泰达学院">泰达学院</option>
						<option value="外国语学院">外国语学院</option>
						<option valuee"日本研究院">日本研究院</option>
						<option value="生命科学学院">生命科学学院</option>
						<option value="远程教育学院">远程教育学院</option>
						<option value="金融发展研究院">金融发展研究院</option>
						<option value="汉语言文化学院">汉语言文化学院</option>
						<option value="旅游与服务学院">旅游与服务学院</option>
						<option value="泰达生物技术学院">泰达生物技术学院</option>
						<option value="泰达应用物理学院">泰达应用物理学院</option>
						<option value="信息技术科学学院">信息技术科学学院</option>
						<option valuee"周恩来政府管理学院">周恩来政府管理学院</option>
						<option value="马克思主义教育学院">马克思主义教育学院</option>
						<option value="环境科学与工程学院">环境科学与工程学院</option>
						<option value="经济与社会发展研究院">经济与社会发展研究院</option>
					</select>
				</div>
				<div class="text_box">
					<p>负责人</p>
					<input type="text" name="chief" class="input_box"/>
				</div>
				<div class="text_box">
					<p>负责人职务</p>
					<input type="text" name="chief_duty" class="input_box"/>
				</div>
				<div class="text_box">
					<p>联系方式</p>
					<input type="text" name="chief_tel" class="input_box"/>
				</div>
				<div class="text_box">
					<p>活动名称</p>
					<input type="text" name="name" class="input_box"/>
				</div>
				<div class="text_box">
					<p>举办时间</p>
					<input type="date" name="date" class="input_box"/>
				</div>
				<div class="text_box">
					<p>具体时段</p>
					<select name="time">
						<option value="上午">上午</option>
						<option value="下午">下午</option>
						<option value="晚上">晚上</option>
					</select>
				</div>
				<div class="text_box">
					<p>申请场地</p>
					<input type="text" name="location" class="input_box"/>
				</div>
				<div class="text_box">
					<p>活动规模</p>
					<select name="scale">
						<option value="0-49人">0-49人</option>
						<option value="50-99人">50-99人</option>
						<option value="100-?人">100-?人</option>
					</select>
				</div>
				<div class="text_box">
					<p>所需设施</p>
					<input type="text" name="needs" class="input_box"/>
				</div>
				<div class="textarea_box">
					<p>活动主要安排</p>
					<textarea name="plan" style="height:400px;"></textarea>
				</div>
				<input type="submit" class="submit_box" value="申请"/>
			</form>
<?php }else{ ?>
			<form action="javascript:apply('large')">
				<ul>
					<li>
						<input type="checkbox" name="large_all" onclick="javascript:select_all('large')"/>
						<a>主办院系</a><a>负责人</a><a>活动名称</a><a>举办时间</a>	<a>申请场地</a><a>活动规模</a><a>所需设施</a><a>主要安排</a><a>全部信息</a>
					</li>
					<hr />
	<?php foreach($apply_large as $var) { ?>
					<li>
						<input type="checkbox" name="large_one" value="<?php echo $var['id'] ?>"/>
						<a><?php echo $var['activity']['college'] ?></a>
						<a><?php echo $var['activity']['chief'] ?></a>
						<a><?php echo $var['activity']['name'] ?></a>
						<a><?php echo $var['activity']['date'].$var['activity']['time'] ?></a>
						<a><?php echo $var['activity']['location'] ?></a>
						<a><?php echo $var['activity']['scale'] ?></a>
						<a><?php echo $var['activity']['needs'] ?></a>
						<a><?php echo $var['activity']['plan'] ?></a>
						<a>查看</a>
					</li>
	<?php } ?>
				</ul>
				<input type="submit" class="apply_box" value="通过"/>
			</form>
<?php } ?>
		</div>
<?php if($type==0){ ?>
		<div id="list_box" class="right">
			<p>本部活动</p>
			<ul>
				<li>
					<a>活动名称</a><a>举办时间</a><a>申请场地</a><a>负责人</a><a>状态</a><a>依托单位意见</a><a>社团联意见</a><a>校团委意见</a>
				</li>
				<hr />
	<?php foreach($activity_list['benbu'] as $var) { ?>
				<li>
					<?php
						echo "<a>".$var['activity']['theme']."</a><a>".$var['activity']['date'].$var['activity']['time']."</a><a>".$var['activity']['location']."</a><a>".$var['activity']['chief']."</a><a>";
						if($var['activity']['status']==0){echo "审批中";}else{echo "通过";}
						echo "</a><a>".$var['opinion_college']."</a><a>".$var['opinion_stl']."</a><a>".$var['opinion_xtw']."</a>";
					 ?>
				</li>
	<?php } ?>
			</ul>
			<p>校区活动</p>
			<ul>
				<li>
					<a>活动名称</a><a>举办时间</a><a>申请场地</a><a>负责人</a><a>状态</a><a>依托单位意见</a><a>社团联意见</a><a>校团委意见</a>
				</li>
				<hr />
	<?php foreach($activity_list['xiaoqu'] as $var) { ?>
				<li>
					<?php
						echo "<a>".$var['activity']['theme']."</a><a>".$var['activity']['date'].$var['activity']['time']."</a><a>".$var['activity']['location']."</a><a>".$var['activity']['chief']."</a><a>";
						if($var['activity']['status']==0){echo "审批中";}else{echo "通过";}
						echo "</a><a>".$var['opinion_college']."</a><a>".$var['opinion_stl']."</a><a>".$var['opinion_xtw']."</a>";
					?>
				</li>
	<?php } ?>
			</ul>
			<p>大型活动</p>
			<ul>
				<li>
					<a>活动名称</a><a>主办院系</a><a>举办时间</a><a>申请场地</a><a>负责人</a><a>状态</a><a>依托单位意见</a><a>社团联意见</a><a>校团委意见</a>
				</li>
				<hr />
	<?php foreach($activity_list['large'] as $var) { ?>
				<li>
					<?php
						echo "<a>".$var['activity']['name']."</a><a>".$var['activity']['college']."</a><a>".$var['activity']['date'].$var['activity']['time']."</a><a>".$var['activity']['location']."</a><a>".$var['activity']['chief']."</a><a>";
						if($var['activity']['status']==0){echo "审批中";}else{echo "通过";}
						echo "</a><a>".$var['opinion_college']."</a><a>".$var['opinion_stl']."</a><a>".$var['opinion_xtw']."</a>";
					?>
				</li>
	<?php } ?>
			</ul>
		</div>
<?php } ?>
		<div id="other_box" class="right">
			<p>NKU社团联在线 beta</p>
			<a>注册社团注意事项：</a>
			<a>1 社团注册时间：每学期开学后第二、三周工作日内。具体情况关注社团联合会通知。如有特殊情况须单独上报社团联。</a>
			<a>2 社团若未在规定时间内完成注册，且未向社团联合会工作人员说明原因，则视为社团自动注销；社团已有《活动许可证》将自动作废，社团活动亦将不予批准。</a>
			<a>3 未注册社团进行活动即视为违规活动，学校相关部门有权对其进行制止与处罚。</a>
			<a>4 《活动许可证》不得涂改、转让、出借。如遗失《活动许可证》，应及时声明作废，并向社团联合会申请补办。</a>
			<br />
			<a>申请活动注意事项：</a>
			<a>1 对于需要资金支持（学校拨款、外联赞助）的社团活动，社团提交《活动审批及场地申请表》进行审批时，须附详细活动策划及预算。以附件形式提交。</a>
			<a>2 以下社团活动，须准备专项申请材料，申请通过后，社团仍需提交《活动审批及场地申请表》，专项申请材料暂时按照原有程序，提交纸质材料。</a>
				<a>（1）“双优工程”系列活动（《“双优工程”项目立项审批表》）；</a>
				<a>（2）社团联主办的系列活动（如“社团文化节”立项申请及答辩）；</a>
				<a>（3）“周末乐坛”系列演出（《“周末乐坛”演出申请表》）；</a>
				<a>（4）其他此类活动。</a>
			<br />
			<a>更新列表</a>
			<a>2012.xx.xx 上线</a>
			<br />
			<a>如果发现bug或者有任何意见和建议请联系poppinlp@gmail.com</a>
		</div>