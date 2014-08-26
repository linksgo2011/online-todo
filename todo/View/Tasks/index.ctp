<div class="row-fluid">
    <div class="span12">
        <table class="table">
            <tr>
                <th>任务名称</th>
                <th>功能简要</th>
                <th>发布时间</th>
                <th>下载详细文档 </th>
                <th>每日进度截图</th>
                <th>任务创建时间</th>
                <th>任务状态</th>
            </tr>
            <?php if ($data): ?>
                
            <?php foreach ($data as $key => $one): ?>
                <?php extract($one['Task']); ?>
                    <tr >
                        <td><?php echo $one['Task']['title']; ?></td>
                        <td><?php echo mb_strcut(strip_tags($one['Task']['detail']), 0,22,'utf-8'); ?></td>
                        <td><?php echo $one['Task']['created']; ?>(天)</td>
                        <?php if ($one['Task']['doc']): ?>
                            <td><a href="<?php echo $one['Task']['doc']; ?>">右键保存</a></td>
                            <?php else: ?>
                            <td>未上传</td>
                        <?php endif ?>
                        <td><a href="/Tasks/edit_schel/<?php echo $one['Task']['id']; ?>">每日截图</a></td>
                        <td><?php echo $one['Task']['created']; ?></td>
                        <td>
                            <?php echo $active_arr[$active]; ?>
                            <?php if ($active == '4'): ?>
                                (+<?php echo $one['TaskAssign']['point']+1; ?>)
                                <?php elseif($active == '-'): ?>
                                (-<?php echo $one['TaskAssign']['point']*2; ?>)
                            <?php else: ?>
                                (<?php echo $one['TaskAssign']['point']; ?>)
                            <?php endif ?>
                        </td>
                    </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td colspan="7">还没有开始的任务!</td>
            </tr>
            <?php endif ?>
        </table>
        <?php echo $this->element('pages'); ?>
    </div>
</div>
<hr>
<p class="alert alert-info">我的积分 <span class="red"><?php echo $user['point']; ?></span> 完成一单得1分，失败一单扣双倍竞价积分,竞价成功会先扣除积分，竞价失败系统自动返还积分。</p>
<div class="row-fluid">
    <div class="col-sm-5" style="border-right:1px solid #efefef;">
        <h4>修改密码</h4>
        <?php echo $this->BForm->create('User'); ?>
        <?php echo $this->BForm->input('id',array('label'=>false,'type'=>'hidden','style'=>'width:200px;')); ?>
        <?php echo $this->BForm->input('password',array('label'=>'密码:','type'=>'password','style'=>'width:200px;')); ?>
        <?php echo $this->BForm->input('cpassword',array('label'=>'重复:','type'=>'password','style'=>'width:200px;')); ?>
        <?php echo $this->BForm->submit('提交'); ?>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-sm-7">
        <h4>接单记录</h4>
        <table class="table">
            <tr>
                <th>任务</th>
                <td>积分</td>
                <td>时间</td>
                <td>是否接到</td>
            </tr>
            <?php if ($task_assigns): ?>
                <?php foreach ($task_assigns as $key => $one): ?>
                    <tr>
                        <td><?php echo $one['Task']['title']; ?></td>
                        <td><?php echo $one['TaskAssign']['point']; ?></td>
                        <td><?php echo $one['TaskAssign']['created']; ?></td>
                        <td><?php echo ($one['TaskAssign']['user_id']==$one['Task']['worker_id'])?"是":"否"; ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    </div>
</div>