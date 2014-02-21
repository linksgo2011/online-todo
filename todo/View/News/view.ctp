<div class="container">
  <div class="row">
    <div class="span12">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-user"></i>
                <h3><?php echo $data['News']['title']; ?></h3>
            </div> <!-- /widget-header -->
            <div class="widget-content">
                <h4 class="text-center"><?php echo $data['News']['title']; ?></h4>
                <p class="text-center">标签:<?php echo $data['News']['keywords']; ?>  创建时间：<?php echo  date('Y-m-d H:i:s',$data['News']['created']); ?></p>
                <hr>
                <div class="content">
                    <?php echo $data['News']['content']; ?>
                </div>
            </div> <!-- /widget-content -->
        </div> <!-- /widget --> 
    </div> <!-- /span6 -->
  </div> <!-- /row -->
</div> <!-- /container -->