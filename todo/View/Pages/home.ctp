<style type="text/css">
    img{max-width:100%;}
</style>
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
<hr>
<div class="jumbotron">
    <table class="table">
        <tr>
            <th>任务名称</th>
            <th>功能简要</th>
            <th>发布时间</th>
            <th>客户联系方式</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        <?php if ($data): ?>
            <?php foreach ($data as $key => $one): ?>
                <tr>
                    <td><?php echo $one['Task']['title']; ?></td>
                    <td >
                        <a href="#" class="show_more"><?php echo mb_strcut(strip_tags($one['Task']['detail']), 0,22,'utf-8'); ?></a>
                        <div class="view-data hide">
                            <?php echo $one['Task']['detail']; ?>
                        </div>
                    </td>
                    <td><?php echo $one['Task']['created']; ?></td>
                    <td>
                        <a class="remote_modal" href="/Tasks/view_info/<?php echo $one['Task']['id']; ?>"  point="<?php echo $one['Task']['point']; ?>">点击查看</a>
                    </td>
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



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">提示</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(".show_more").click(function(){
        $("#myModal .modal-body").html($(this).next().html());
        $('#myModal').modal();
    });
    // $(".btn-lg").click(function(){
    //     $('#myModal').modal();
    // })

    $(".remote_modal").click(function() {
        var point = $(this).attr("point");
        var href = $(this).attr("href");
        if (confirm("扣除"+point+"个积分,是否确定查看?")) {
            $('#myModal .modal-body').load(href);
            $('#myModal').modal();
        }
        return false;
    })
</script>