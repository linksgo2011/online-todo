<div class="row-fluid">
    <div class="span12">
        <table class="table">
            <tr>
                <th>任务名称</th>
                <th>功能简要</th>
                <th>开发周期</th>
                <th>下载详细文档 </th>
                <th>完成状态</th>
                <th>每日进度截图</th>
                <th>任务创建时间</th>
            </tr>
            <?php if ($data): ?>
                
            <?php foreach ($data as $key => $one): ?>
                <?php extract($one['Task']); ?>
                    <tr >
                        <td><?php echo $one['Task']['title']; ?></td>
                        <td><?php echo $this->Text->truncate(strip_tags($one['Task']['detail']),20); ?></td>
                        <td><?php echo $one['Task']['period']; ?>(天)</td>
                        <td><a href="<?php echo $one['Task']['doc']; ?>">右键下载详细文档</a></td>
                        <td><?php echo $active_arr[$active]; ?></td>
                        <td><a href="/Tasks/edit_schel/<?php echo $one['Task']['id']; ?>">每日截图</a></td>
                        <td><?php echo $one['Task']['created']; ?></td>
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
<div class="row-fluid">
    <div class="span12">
        <p>我的积分 <span class="red"><?php echo $user['point']; ?></span> 完成一单1分，撤销一单扣2分</p>
    </div>
</div>