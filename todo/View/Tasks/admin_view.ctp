<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">查看任务</div>
    <div class="block-body collapse in">
        <p></p>
            <table class="table">
                <tr>
                    <th>任务标题</th>
                    <td><?php echo $task['Task']['title']; ?></td>
                </tr>
                <tr>
                    <th>任务简介</th>
                    <td><?php echo $task['Task']['detail']; ?></td>
                </tr>
            </table>
            <hr>
            <h5>任务申请记录 </h5>
            <table class="table">
                <tr>
                    <th>会员</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
                <?php if ($task_assign_users): ?>
                    <?php foreach ($task_assign_users as $key => $one): ?>
                    <tr>
                        <td><?php echo $one['User']['name']; ?></td>
                        <td><?php echo $one['TaskAssign']['created']; ?></td>
                        <td>
                            <?php if ($task['Task']['active'] == 1): ?>
                                <a href="<?php echo $this->Html->Url(array('admin'=>true,"action"=>"take_assign",$task['Task']['id'],$one['User']['id'])); ?>">采纳</a>
                            <?php endif ?>  
                        </td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>

            </table>
            <hr>
            <table class="table">
                <tr>
                    <th>任务获得者</th>
                    <td><?php echo $task['Worker']['name']; ?></td>
                </tr>
                <tr>
                    <th>任务进度报告</th>
                    <td><?php echo $task['Task']['schel_detail']; ?></td>
                </tr>
            </table>
    </div>
</div>