<div class="container">
  <div class="row">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3>查看新闻</h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
                <table class="table" >
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>标签</th>
                        <th>创建时间</th>
                        <th>操作</th>
                    </tr>
                    <?php if ($data): ?>
                    <?php foreach ($data as $key => $one): ?>
                        <tr>
                            <td><?php echo $one['News']['id']; ?></td>
                            <td><?php echo $one['News']['title']; ?></td>
                            <td><?php echo $one['News']['keywords']; ?></td>
                            <td><?php echo date('Y-m-d H:i:s',$one['News']['created']); ?></td>
                            <td><?php echo $this->Html->link("查看",array('action'=>'view',$one['News']['id'])); ?></td>
                        </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                </table>
                <?php echo $this->element("pagesb3"); ?>
            </div> <!-- /widget-content -->
        </div> <!-- /widget --> 
    </div> <!-- /span6 -->

  </div> <!-- /row -->

</div> <!-- /container -->