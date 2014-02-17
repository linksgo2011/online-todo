<?php 
class Task extends AppModel {

    public $useTable = 'tasks';

    public $active_arr = array('-1'=>'删除','1'=>'待分配','2'=>'已分配','3'=>'等待测试','4'=>'已完成','5'=>'拒绝任务','6'=>'测试未通过');
    public $task_type_arr = array('1'=>'Bug','2'=>'新功能','3'=>'体验改进','4'=>'营销工作','5'=>'运营工作');
    public $platform_arr = array(
        'oem'=>'OEM平台','admin'=>'Admin管理及主系统','media'=>'移动营销及防伪溯源',
        'ticket'=>'通用电子票及淘宝','checkout'=>'电子签到','food'=>'点餐系统'
        ,'emember'=>'电子会员卡','ecard'=>'电子名片'
        );
    public $important_level_arr = array('1'=>'低','2'=>'一般重要','3'=>'重要','4'=>'非常重要');
    public $priority_arr = array('1'=>'低','2'=>'中','3'=>'高','4'=>'尽快解决','必须马上解决');

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '必须填写'
            )
        ),
    );

    public $hasMany = array(
        'Log' => array(
            'className' => 'Log',
            'foreignKey' => 'task_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'publisher_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
}
 ?>