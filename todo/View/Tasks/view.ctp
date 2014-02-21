<?php extract($task['Task']); ?>
<?php echo $this->Form->create('Task'); ?>
	<div class="row-fluid">
		<div class="span4">
			<!-- 操作工具条 -->
			<?php if ($active == 1): ?>
				<a href="<?php echo $this->Html->url(array('action'=>'assign_me',$id)) ?>" class="btn btn-info">分配给自己</a>
			<?php endif ?>
			<?php if ($active == 2): ?>
				<a href="<?php echo $this->Html->url(array('action'=>'alt_active',$id,3)) ?>" class="btn btn-info btn-test">提交测试</a>
				<?php if ( is_array($task_assign_users) && in_array($user_id,array_keys($task_assign_users)) ): ?>
					<a href="<?php echo $this->Html->url(array('action'=>'alt_active',$id,5)) ?>" class="btn btn-info btn-reject" >拒绝任务</a>
				<?php endif ?>
			<?php endif ?>
			<?php if ($active == 3): ?>
				<a href="<?php echo $this->Html->url(array('action'=>'alt_active',$id,4)) ?>" class="btn btn-info">通过测试</a>
				<a href="<?php echo $this->Html->url(array('action'=>'alt_active',$id,6)) ?>" class="btn btn-info">测试未通过</a>
			<?php endif ?>
			<?php if ($active == 6): ?>
				<a href="<?php echo $this->Html->url(array('action'=>'alt_active',$id,3)) ?>" class="btn btn-info btn-test">提交测试</a>
			<?php endif ?>
			<hr>
			<div class="hidden" id="input-test">
				<?php echo $this->Form->input('with_time',array('div'=>false,'type'=>'text','label'=>'用时(小时):')); ?>
				<a href="#" class="btn btn-info">提交</a>
			</div> 
			<div class="hidden" id="input-reject">
				<?php echo $this->Form->input('reject',array('div'=>false,'type'=>'textarea','label'=>'拒绝原因:')); ?>
				<a href="#" class="btn btn-info">提交</a>
			</div> 	

			<dl>
				<dt>任务状态</dt>
				<dd class="label label-info"><?php echo $active_arr[$active]; ?></dd>
				<?php if ($with_time): ?>
				<dt>用时(小时)</dt>
				<dd class="label label-info"><?php echo $with_time; ?></dd>
				<?php endif ?>
				<dt>任务类型</dt>
				<dd class="label label-info"><?php echo $task_type_arr[$task_type]; ?></dd>
				<dt>所属模块</dt>
				<dd class="label label-info"><?php echo $platform_arr[$platform]; ?></dd>
				<dt>重要性</dt>
				<dd class="label label-info"><?php echo $important_level_arr[$important_level]; ?></dd>
				<dt>优先等级</dt>
				<dd class="label label-info"><?php echo $priority_arr[$priority]; ?></dd>
				<dt>任务期限</dt>
				<dd class="label label-info"><?php echo $expired; ?></dd>
			</dl>
			<hr />
			<?php echo $this->Form->input('assign',array('label'=>'分配到:','options'=>$user_arr));?>
			<a href="javascript:void(0);" class="btn" id="assgin_btn">分配</a>
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
			<div class="page-header">
			  <h4><?php echo $title; ?> 
			  	<small>创建者<b><?php echo $task['User']['name']; ?></b></small>
			  	<small>创建时间 <b><?php echo $task['Task']['created']; ?></b></small>
			  </h4>
			  <hr />
			  <div class="content">
			  	<p>
					<?php echo $detail; ?>		  		
			  	</p>
			  </div>
			</div>
			<p>
				操作:
				<!-- 自己不能删除 -->
				<a href="<?php echo $this->Html->url(array('action'=>'edit',$id)); ?>"><i class="icon icon-pencil"></i>编辑</a>
				<?php if ( is_array($task_assign_users) && !in_array($user_id,array_keys($task_assign_users)) ): ?>
					<a href="<?php echo $this->Html->url(array('action'=>'del',$id)); ?>"><i class="icon  icon-remove"></i>删除</a>
				<?php endif ?>
			</p>
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
	$("#assgin_btn").bind('click',function(){
    	var user_id = $("#TaskAssign").val();
    	location.href = "<?php echo $this->Html->url(array('action'=>'assign',$id)); ?>"+"/"+user_id;
    	return false;
    });
</script>
<script type="text/javascript">
	$('.btn-test').click(function(){
		$("#input-test").show();
		$("#input-reject").hide();
		$("#input-test>a").unbind().bind('click',function(){
			var url = $('.btn-test').attr('href')+'?with_time='+$("#TaskWithTime").val();
			location.href = url;
		})
		return false;
	});
	$('.btn-reject').click(function(){
		$("#input-reject").show();
		$("#input-test").hide();
		$("#input-reject>a").unbind().bind('click',function(){
			var url = $('.btn-reject').attr('href')+'?reject='+$("#TaskReject").val();
			location.href = url;
		})
		return false;
	});
</script>