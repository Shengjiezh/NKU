<textarea></textarea>
<span><a class="btn" href="javascript:post_msg('<?php echo $to_id; ?>')">发送</a></span>
<?php foreach($msgs as $msg) { ?>
<?php if($msg['from'] == $this->user_model->id) {?>
<div class="talk_box me">
<?php } else { ?>
<div class="talk_box other">
<?php } ?>
	<p class="content"><?php echo $msg['content']; ?></p>
	<p class="date"><?php echo $msg['ctime']; ?></p>
</div>
<?php } ?>
