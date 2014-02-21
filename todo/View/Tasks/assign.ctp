<h4>申请任务</h4>
<p class="alert tip">说明：该需求在5小时内自动判给提交积分越高者，
如未完成任务，则扣除双倍积分。</p>
<div class="row-fluid">
    <div class="col-md-6">
        <p class="red">当前积分 <?php echo $current_user['point']; ?></p>
        <?php echo $this->BForm->create("Task"); ?>
        <?php echo $this->BForm->input('point',array('label'=>'积分','type'=>'text','style'=>'width:200px;')); ?>
        
        <?php echo $this->BForm->submit('提交'); ?>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-md-6">
        <h4>积分申请记录</h4>
        <table class="table">
            <tr>    
                <th>会员</th>
                <th>竞标积分</th>
                <th>时间</th>
            </tr>
            <?php if ($data): ?>
                <?php foreach ($data as $key => $one): ?>
                    <tr>
                        <td><?php echo $one['User']['name'] ?></td>
                        <td><?php echo $one['TaskAssign']['point'] ?></td>
                        <td><?php echo $one['TaskAssign']['created']; ?></td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
    </div>
</div>
