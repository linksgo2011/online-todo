<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">网站新闻</div>
    <div class="block-body collapse in">
        <p></p>
        <p>
            <a href="/admin/News/add/" class="btn btn-warning pull-right">添加网站新闻</a>
        </p>
        <div class="inline-form row-fluid">
            <?php $this->BForm->formatInput = "%s %s"; ?>
            <?php echo $this->Form->Create('News',array('type'=>'get','class'=>'form-inline')); ?>
            <?php echo $this->BForm->input("title",array('label'=>'标题','required'=>false)); ?>
            <?php echo $this->BForm->input("active",array('label'=>'状态','options'=>$active_arr,'empty'=>'选择状态','required'=>false,'style'=>'width:100px;')); ?>
            <?php echo $this->BForm->input("keywords",array('label'=>'关键词','required'=>false)); ?>
            <?php echo $this->BForm->submit("搜索",array('class'=>'btn')); ?>
            <?php echo $this->Form->end(); ?>
        </div>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>状态</th>
                <th>标题</th>
                <th>标签</th>
                <th>创建时间</th>
                <th>操作</th>
            </tr>
            <?php if ($data): ?>
                <?php foreach ($data as $key => $one): ?>
                    <tr>
                        <td><?php echo $one['News']['id']; ?></td>
                        <td><?php echo $active_arr[$one['News']['active']]; ?></td>
                        <td><?php echo $one['News']['title']; ?></td>
                        <td><?php echo $one['News']['keywords']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s',$one['News']['created']); ?></td>
                        <td>
                            <?php echo $this->Html->link("编辑",array('action'=>'edit',$one['News']['id'],'admin'=>true)); ?>
                            <?php echo $this->Form->postLink("删除",array('action'=>'delete',$one['News']['id'],'admin'=>true)); ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        <?php echo $this->element('pages'); ?>
    </div>
</div>