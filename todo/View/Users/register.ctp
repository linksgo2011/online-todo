<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="row">
   <div class="span8">
        <?php
        echo $this->Form->create('User',array('class'=>"form-horizontal"));
        echo "<fieldset><legend>快速注册（只需5秒）</legend>";
        echo $this->Form->input("email", 
                array(
                    'class'=>'input-xlarge',
                    'label' => array('text'=>'邮箱：','class' => 'control-label'),
                    'between'=>'<div class="controls">',
                    'after'=>'<span class="help-inline">将使用此邮箱作为登录帐号！</span></div>',
                    'div' => array('class' => 'control-group'),
                    'error' => array('attributes' => array( 'class' => 'help-inline'))
                    )
             );
        echo $this->Form->input("password", 
                array(
                    'class'=>'input-xlarge',
                    'label' => array('text'=>'登录密码：','class' => 'control-label'),
                    'between'=>'<div class="controls">',
                    'after'=>'<span class="help-inline"></span></div>',
                    'div' => array('class' => 'control-group'),
                    'error' => array('attributes' => array( 'class' => 'help-inline'))
                    )
             );
        echo $this->Form->Submit('提交', 
                array(
                    'class'=>'btn btn-primary  btn-large offset1 dd',
                    'div' => array('class' => 'control-group')
                    )
                );
        echo "</fieldset>";
        echo $this->Form->end();
        ?>
    </div>
    <div class="span4">
        <a href="/">已经有帐号？</a>
    </div>
</div>       