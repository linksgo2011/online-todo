<?php 
echo $this->Html->script('/js/kindeditor/kindeditor-min.js');?>
<?php 
	echo $this->Html->script('jquery-ui-1.9.2.custom.min');
	echo $this->Html->script('jquery.ui.datepicker-zh');
	echo $this->Html->script('jquery-ui-timepicker-addon');
	echo $this->Html->css('jquery-ui');
 ?>

<?php echo $this->Form->create('Task'); ?>
	<div class="row-fluid">
		<div class="span4">
			<?php echo $this->Form->input('id',array('label'=>false,'type'=>'hidden')); ?>
			<?php echo $this->Form->input('active',array('label'=>'任务状态:','options'=>$active_arr)); ?>
			<div id="with_time_field" class="hidden">
				<?php echo $this->Form->input('with_time',array('type'=>'text','label'=>'用时(小时):')); ?>
			</div>

			<?php echo $this->Form->input('task_type',array('label'=>'任务类型:','options'=>$task_type_arr)); ?>
			<?php echo $this->Form->input('platform',array('label'=>'所属模块:','options'=>$platform_arr)); ?>
			<?php echo $this->Form->input('important_level',array('label'=>'重要性:','options'=>$important_level_arr)); ?>
			<?php echo $this->Form->input('priority',array('label'=>'优先等级:','options'=>$priority_arr)); ?>
			<?php echo $this->Form->input('expired',array('type'=>'text','label'=>'任务期限:','class'=>'datetimepicker'));?>

			<hr />
			<?php echo $this->Form->input('assign',array('label'=>'分配到:','options'=>$user_arr));?>
			<a href="#" class="btn" id="assgin_btn">分配</a>
			<h5>已经分配的人员</h5>
			<ul>
				<?php foreach ($task_assign_users as $user_id => $username): ?>
					<li><span><?php echo $username; ?></span><a href="<?php echo $this->Html->url(array('action'=>'un_assign',$id,$user_id)); ?>">X</a></li>
				<?php endforeach ?>				
			</ul>
			<hr /> 
			<h5>操作日志</h5>
			<ul>
				<?php foreach ($task['Log'] as $key => $one): ?>
				<li>
					<?php echo $one['User']['name']; ?>
					 于 
					<?php echo $one['created']; ?>
					<?php echo $one['name']; ?>
				</li>
				<?php endforeach ?>
			</ul>
		</div>

		<div class="span8">
			<?php echo $this->Form->input('title',array('label'=>'任务主题:',)); ?>
			<?php echo $this->Form->input('detail',array('label'=>'任务详情:','class'=>'editor_area')); ?>
			<hr>
			<p>
				<?php echo $this->Form->submit('更新',array('class'=>'btn btn-info')); ?>
			</p>
			<hr />
		</div>
	</div>
<?php echo $this->Form->end(); ?>
<hr />
<div class="row-fluid">
	<div class="span12">
		<?php echo $this->Form->create('Comment',array('url'=>array('controller'=>'tasks','action'=>'comment',$id))); ?>
		<?php echo $this->Form->input('detail',array('label'=>'评论:','type'=>'textarea','cols'=>'700')); ?>
		<?php echo $this->Form->end('提交评论') ?>
	</div>
</div>

<div class="row-fluid">
	<div class="span12">
		<h5>评论内容</h5>
		<table class="table">
			<tr>
				<th>评论者</th>
				<th>评论内容</th>
				<th>评论时间</th>
			</tr>
			<?php foreach ($comments as $key => $one): ?>
				<tr>
					<td><?php echo $one['User']['name']; ?></td>
					<td><?php echo $one['Comment']['detail']; ?></td>
					<td><?php echo $one['Comment']['created']; ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<script type="text/javascript">
	KindEditor.ready(function(K) {
    editor = K.create('.editor_area', {
        resizeType : 0,
        allowPreviewEmoticons : false,
        uploadJson : '<?php echo $this->Html->url(array("action"=>"ajaxAdd")); ?>',
        allowImageUpload : true,
        width: '100%',
        height: '500px',
        items : [
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'removeformat', 
        '|', 
        'justifyleft', 'justifycenter', 'justifyright',
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 
        '|',
        'link', 'unlink',
        '|', 
        'image', 'table', 'map'
        ]
    });
});

	$('.datetimepicker').datetimepicker({
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });

	$("#assgin_btn").bind('click',function(){
    	var user_id = $("#TaskAssign").val();
    	location.href = "<?php echo $this->Html->url(array('action'=>'assign',$id)); ?>"+"/"+user_id;
    });
    $("#TaskActive").change(function(){
    	if($(this).val() == 3){
    		$("#with_time_field").show();
    	}else{
    		$("#with_time_field").hide();
    	}
    }).change();
</script>