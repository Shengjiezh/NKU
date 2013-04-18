<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="login_lable"><?php echo $title; ?></h3>
</div>
<div class="modal-body form-horizontal">
    <div class="control-group">
		<label class="control-label" for="username">用户名</label>
         <div class="controls">
            <input type="text" id="username" value="<?php echo $username; ?>" />
        </div>
    </div>
    <div class="control-group">
		<label class="control-label" for="password">密码</label>
        <div class="controls">
	        <input type="text" id="password" />
        </div>
    </div>
    <?php if(isset($name)) { ?>
    <div class="control-group">
		<label class="control-label" for="name">名称</label>
        <div class="controls">
	        <input type="text" id="password" value="<?php echo $name; ?>" />
        </div>
    </div>
    <?php } ?>
</div>
<div class="modal-footer">
	<button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
	<button class="btn btn-primary" type="submit">确认</button>
</div>
