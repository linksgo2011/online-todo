<?php 
echo $this->Html->script('/js/kindeditor/kindeditor-min.js');?>
<?php 
    echo $this->Html->script('jquery-ui-1.9.2.custom.min');
    echo $this->Html->script('jquery.ui.datepicker-zh');
    echo $this->Html->script('jquery-ui-timepicker-addon');
    echo $this->Html->css('jquery-ui');
 ?>
<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">请在这里上传每天完成的进度</div>
    <div class="block-body collapse in">
        <p></p>
            <?php echo $this->BForm->create('Task',array('type'=>'file')); ?>
            <?php echo $this->Form->input('id',array('label'=>'id:','div'=>false,'type'=>'hidden')); ?>
            <?php echo $this->BForm->input('schel_detail',array('label'=>'每日截图:')); ?>
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