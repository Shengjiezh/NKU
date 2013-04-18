<?php $this->load->view('block/header'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo css_path(); ?>notice.css" />
</head>
<body>
	<div id="leftside"></div>
	<div id="center">
		<?php $this->load->view('block/nav'); ?>
		<div id="main">
			<span id="breadcrumb">
				<a href="<?php echo base_url(); ?>">首页</a>&#160;&#160;&#9658;&#160;<a href="<?php echo base_url().'notice'; ?>">通知</a>
			</span>
			<div id="msg_list">
                        <?php if(empty($notices)) { ?>
                                <a style="font-size:14px;color#333;display:block;padding:10px 20px;line-height:24px;text-align:center;">通知都是系统在不同情况下给用户们发出的，不用担心其真实性。目前通知列表为空，当通知列表不为空时，本条信息将不再显示。</a>
                        <?php } else { foreach($notices as $notice) { ?>
                                <div class="sysmsg_item" id="item_<?php echo $notice['id']; ?>">
                                        <div class="item_title" id="<?php echo $notice['id']; ?>">
                                                <a>【<?php echo $notice['type']; ?>】</a>
                                                <a><?php echo $notice['title']; ?></a>
                                                <?php if($notice['status'] == 1) { ?>
                                                <a class="new_msg">new!</a>
                                                <?php } ?>
                                                <i><?php echo $notice['ctime']; ?></i>
                                        </div>
                                        <div class="item_content" id="item_content_<?php echo $notice['id']; ?>">
                                                <p><?php echo $notice['content']; ?></p>
                                                <p><a class="btn" href="javascript:del_sysmsg('<?php echo $notice['id']; ?>')">删除</a></p>
                                        </div>
                                </div>
                        <?php } } ?>
                	</div>
		</div>
		<?php $this->load->view('block/footer'); ?>
	</div>
</body>
	<script type="text/javascript" src="<?php echo js_path(); ?>notice.js"></script>
</html>
