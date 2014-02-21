<div class="jumbotron">
    <table class="table">
        <tr>
            <th>任务名称</th>
            <th>功能简要</th>
            <th>开发周期</th>
            <th>下载详细文档 </th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php if ($data): ?>
            <?php foreach ($data as $key => $one): ?>
                <tr>
                    <td><?php echo $one['Task']['title']; ?></td>
                    <td><?php echo $this->Text->truncate(strip_tags($one['Task']['detail']),20); ?></td>
                    <td><?php echo $one['Task']['period']; ?>(天)</td>
                    <?php if ($one['Task']['doc']): ?>
                        <td><a href="<?php echo $one['Task']['doc']; ?>">右键保存</a></td>
                        <?php else: ?>
                        <td>未上传</td>
                    <?php endif ?>
                    <td><?php echo $active_arr[$one['Task']['active']] ?></td>
                    <td>
                        <?php if ($one['Task']['active'] == 1): ?>
                            <a href="/Tasks/assign/<?php echo $one['Task']['id']; ?>">接单</a>
                            <?php else: ?>
                            <span>接单</span>
                        <?php endif ?>
                    </td>
                </tr>
            <?php endforeach ?>
        <?php endif ?>
        <tr></tr>
    </table>
    <?php echo $this->element('Pages'); ?>
</div>
<hr>
<div class="row-fluid marketing">
    <div class="span6">
        <h4>公告</h4>
        <ul>
            <?php if ($news): ?>
                <?php foreach ($news as $key => $one): ?>
                    <li>
                        <a href="/Pages/view/<?php echo $one['News']['id']; ?>"><?php echo $one['News']['title']; ?></a>
                        <span class="pull-right"><?php echo date('Y-m-d H:i:s',$one['News']['created']); ?></span>
                    </li>
                <?php endforeach ?>
            <?php endif ?>
        </ul>
    </div>
</div>