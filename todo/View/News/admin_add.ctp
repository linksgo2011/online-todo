<div class="block span12">
    <div class="block-heading" data-toggle="collapse" data-target="#tablewidget">添加网站公告</div>
    <div class="block-body collapse in">
        <p></p>
        <div>
            <?php 
                $this->BForm->formatInput = '<div class="control-group"><label class="control-label">%s</label><div class="controls">%s</div></div>';
             ?>
            <?php echo $this->BForm->create('News',array('type'=>'file')); ?>
            <?php echo $this->BForm->input('id',array('label'=>false,'type'=>'hidden','style'=>'width:200px;')); ?>
            <?php echo $this->BForm->input('title',array('label'=>'标题','type'=>'text','style'=>'width:200px;')); ?>
            <?php echo $this->BForm->input('keywords',array('label'=>'关键词','type'=>'text','style'=>'width:200px;')); ?>
            <?php echo $this->BForm->input('content',array('label'=>'内容','type'=>'textarea','style'=>'width:200px;')); ?>
            <?php echo $this->BForm->input('active',array('legend'=>false,'label'=>'是否发布','default'=>'0','options'=>$active_arr,'type'=>'radio')); ?>
            <?php echo $this->BForm->submit('提交'); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
<?php echo $this->Html->script('/js/kindeditor/kindeditor-min.js'); ?>
<script type="text/javascript">
    KindEditor.ready(function(K) {
        editor = K.create('#NewsContent', {
            resizeType : 0,
            allowPreviewEmoticons : false,
            uploadJson : '/tasks/ajaxAdd',
            width: '80%',
            height: '400px',
            items : [
                'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough', 'removeformat', 
                '|', 
                'justifyleft', 'justifycenter', 'justifyright',
                'justifyfull', 'insertorderedlist', 'insertunorderedlist', 
                'lineheight',
                '|',
                'link', 'unlink',
                '|', 
                'image', 'table', 'media','map','source'
            ]
        });
    });
</script>