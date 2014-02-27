<style type="text/css">
.form-signin {
max-width: 300px;
padding: 19px 29px 29px;
margin: 40px auto 20px;
background-color: #fff;
border: 1px solid #e5e5e5;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
-webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
-moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
}
.form-signin .form-signin-heading,.form-signin .checkbox {
margin-bottom: 10px;
}
.form-signin input[type="text"],.form-signin input[type="password"] {
font-size: 16px;
height: auto;
margin-bottom: 15px;
padding: 7px 9px;
}
</style>
<?php echo $this->Form->create('User', array('class'=>'form-signin'));?>
<h2 class="form-signin-heading">任务管理系统</h2>
<?php echo $this->Form->input('email', array('div'=>false, 'label'=>false, 'class'=>'input-block-level', 'placeholder'=>'注册邮箱'));?>
<?php echo $this->Form->input('password', array('div'=>false, 'label'=>false, 'type'=>'password', 'class'=>'input-block-level', 'placeholder'=>'密码'));?>
<?php echo $this->Form->button('登录', array('class'=>'btn btn-large btn-primary', 'type'=>'submit'));?>
<hr>    
<p>QQ 954893376 开通会员</p>
<?php echo $this->Form->end();?>