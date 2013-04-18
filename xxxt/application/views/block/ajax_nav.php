<a href="<?php echo base_url(); ?>"><li>首页</li></a>
<a href="<?php echo base_url().'article'; ?>"><li>文章</li></a>
<a href="<?php echo base_url().'teacher'; ?>"><li>名师</li></a>
<a href="<?php echo base_url().'reservation'; ?>"><li>预约</li></a>
<?php if($this->user_model->is_login) { ?>
<a href="<?php echo base_url().'user'; ?>"><li>个人</li></a>
<a href="<?php echo base_url().'msg'; ?>"><li>私信</li></a>
<a href="<?php echo base_url().'notice'; ?>"><li>通知</li></a>
<a href="javascript:logout()"><li>注销</li></a>
<?php } else { ?>
<a href="javascript:show_user_box('register')"><li>注册</li></a>
<a href="javascript:show_user_box('login')"><li>登录</li></a>
<?php } ?>
