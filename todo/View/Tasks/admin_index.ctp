<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">任务管理</div>
    <div class="block-body collapse in">
        <p></p>
        <p>
            <a href="/admin/Tasks/add/" class="btn btn-warning pull-right">添加任务</a>
        </p>
        <div class="inline-form row-fluid">
            <?php unset($active_arr['-1']); ?>
            <?php $this->BForm->formatInput = "%s %s"; ?>
            <?php echo $this->Form->Create('Task',array('type'=>'get','class'=>'form-inline')); ?>
            <?php echo $this->BForm->input("title",array('label'=>'标题','required'=>false)); ?>
            <?php echo $this->BForm->input("active",array('label'=>'状态','options'=>$active_arr,'empty'=>'选择状态','required'=>false,'style'=>'width:100px;')); ?>
            <?php echo $this->BForm->submit("搜索",array('class'=>'btn')); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>状态</th>
                <th>标题</th>
                <th>文档</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            <?php if ($data): ?>
                <?php foreach ($data as $key => $one): ?>
                    <tr>
                        <td><?php echo $one['Task']['id']; ?></td>
                        <td><?php echo $active_arr[$one['Task']['active']]; ?></td>
                        <td><?php echo $one['Task']['title']; ?></td>
                        <?php if ($one['Task']['doc']): ?>
                            <td><a href="<?php echo $one['Task']['doc']; ?>">下载</a></td>
                            <?php else: ?>
                            <td>没有上传</td>
                        <?php endif ?>
                        <td><?php echo $one['Task']['created'] ?></td>
                        <td>
                            <?php echo $this->Html->link("查看",array('action'=>'view',$one['Task']['id'],'admin'=>true)); ?>
                            <?php echo $this->Html->link("编辑",array('action'=>'edit',$one['Task']['id'],'admin'=>true)); ?>
                            <?php echo $this->Form->postLink("删除",array('action'=>'delete',$one['Task']['id'],'admin'=>true)); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        <?php echo $this->element('pages'); ?>
    </div>
</div>