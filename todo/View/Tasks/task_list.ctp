<div class="row-fluid">
	<div class="span12">
		<fieldset>
			<span>所有任务</span>
			<?php 
			  		$active = $this->request->data['Task']['active'];
			 ?>
			<div class="btn-group">
			  <a class="btn <?php echo $active==1?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'1'))) ?>">未分配</a>
			  <a class="btn <?php echo $active==2?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'2'))) ?>">已分配</a>
			  <a class="btn <?php echo $active==3?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'3'))) ?>">等待测试</a>
			  <a class="btn <?php echo $active==4?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'4'))) ?>">已完成</a>
			  <a class="btn <?php echo $active==5?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'5'))) ?>">拒绝任务</a>
			  <a class="btn <?php echo $active==6?'btn-info':''; ?>" href="<?php echo $this->Html->url(array('?'=>array('active'=>'6'))) ?>">测试未通过</a>
			</div>
			<p><hr></p>
			<div class="clearfix"></div>
			<?php echo $this->Form->create('Task',array('type'=>'get','class'=>'search-form')) ?>
			<?php echo $this->Form->input('active',array('label'=>'任务状态:','empty'=>'全部','options'=>$active_arr)); ?>
			<?php echo $this->Form->input('task_type',array('div'=>false,'empty'=>'全部','label'=>'任务类型:','options'=>$task_type_arr)); ?>
			<?php echo $this->Form->input('platform',array('div'=>false,'empty'=>'全部','label'=>'所属模块:','options'=>$platform_arr)); ?>
			<?php echo $this->Form->input('important_level',array('div'=>false,'empty'=>'全部','label'=>'重要性:','options'=>$important_level_arr)); ?>
			<?php echo $this->Form->input('priority',array('div'=>false,'empty'=>'全部','label'=>'优先等级:','options'=>$priority_arr)); ?>
			<?php echo $this->Form->input('assign',array('div'=>false,'empty'=>'全部','label'=>'分配到:','options'=>$user_arr));?>
			<?php echo $this->Form->end('搜索') ?>
		</fieldset>
	</div>
</div>
<div class="row-fluid">
	<div class="span12">
		<table class="table">
			<tr>
				<th>ID</th>
				<th>接收者</th>
				<th>任务类型</th>
				<th>所属模块</th>
				<th>重要性</th>
				<th>优先等级</th>
				<th>任务主题</th>
				<th>发布时间</th>
				<th>到期时间</th>
				<th>状态</th>
			</tr>
			<?php foreach ($data as $key => $one): ?>
				<?php extract($one['Task']); ?>
					<tr onclick="locate('<?php echo $id; ?>')" <?php echo strtotime($expired)<time()?'style="background:#fe6;"':''; ?> >
						<td><?php echo $id; ?></td>
						<td><?php echo $one['task_assign_users']?join($one['task_assign_users'],','):'还没有分配任务'; ?></td>
						<td><?php echo $task_type_arr[$task_type]; ?></td>
						<td><?php echo $platform_arr[$platform]; ?></td>
						<td><?php echo $important_level_arr[$important_level]; ?></td>
						<td><?php echo $priority_arr[$priority]; ?></td>
						<td><?php echo $title; ?></td>
						<td>
							<?php echo $created; ?>
							<?php echo ($end_time > $expired)?'<span class="label">超期</span>':''; ?>
						</td>
						<td><?php echo $expired; ?></td>
						<td><?php echo $active_arr[$active]; ?></td>
					</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>

<script type="text/javascript">
	function locate(id){
		location.href = "<?php echo $this->Html->url(array('action'=>'view')); ?>"+'/'+id;
	}
	$(".table tr").hover(function(){
		$(this).addClass('active');
	},function(){
		$(this).removeClass('active');
	});
</script>
<?php echo $this->element('pages'); ?>