<?php 
echo $this->Html->script('/js/kindeditor/kindeditor-min.js');?>
<?php 
    echo $this->Html->script('jquery-ui-1.9.2.custom.min');
    echo $this->Html->script('jquery.ui.datepicker-zh');
    echo $this->Html->script('jquery-ui-timepicker-addon');
    echo $this->Html->css('jquery-ui');
 ?>
<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">修改任务</div>
    <div class="block-body collapse in">
        <p></p>
            <?php 
                $this->BForm->formatInput = '<div class="control-group"><label class="control-label">%s</label><div class="controls">%s</div></div>';
             ?>
            <?php echo $this->BForm->create('Task',array('type'=>'file')); ?>
            <?php echo $this->Form->input('id',array('label'=>'id:','div'=>false,'type'=>'hidden')); ?>
            <?php echo $this->BForm->input('title',array('label'=>'任务名称:',)); ?>
            <?php echo $this->BForm->input('detail',array('label'=>'功能简要:')); ?>
            <?php echo $this->BForm->input('doc',array('label'=>'上传详细文档:','type'=>'file','after'=>"<p>上传后讲修改原有的文件，点击下载<a href='{$this->request->data['Task']['doc']}'>右键下载</a></p>")); ?>
            <?php unset($active_arr['-1']); ?>
            <?php echo $this->BForm->input('active',array('label'=>'状态:','options'=>$active_arr,'default'=>1)); ?>
            <p>
                <?php echo $this->BForm->submit('保存',array('class'=>'btn btn-info')); ?>
            </p>
            <?php echo $this->Form->end(); ?>
    </div>
</div>
<script type="text/javascript">
    KindEditor.ready(function(K) {
    editor = K.create('textarea', {
        resizeType : 0,
        allowPreviewEmoticons : false,
        uploadJson : '/tasks/ajaxAdd',
        allowImageUpload : true,
        width: '100%',
        height: '500px',
        items : [
        'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'removeformat', 
        '|', 
        'justifyleft', 'justifycenter', 'justifyright',
        'justifyfull', 'insertorderedlist', 'insertunorderedlist', 
        '|',
        'link', 'unlink',
        '|', 
        'image', 'table', 'map'
        ]
    });
    $('.datetimepicker').datetimepicker({
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    
    $("#TaskIndexForm").bind('submit',function(){
        if(!$("#TaskExpired").val()){
            if(confirm('你没有输入任务过期时间，是否需要使用一个默认时间?')){
                $("#TaskExpired").val(date2str(new Date(),"yyyy-MM-dd hh:mm:ss"));          
            }
        }
    })

    function date2str(x,y) {
        var z = {M:x.getMonth()+1,d:x.getDate(),h:x.getHours(),m:x.getMinutes(),s:x.getSeconds()};
        y = y.replace(/(M+|d+|h+|m+|s+)/g,function(v) {return ((v.length>1?"0":"")+eval('z.'+v.slice(-1))).slice(-2)});
        return y.replace(/(y+)/g,function(v) {return x.getFullYear().toString().slice(-v.length)});
    }
});
</script>