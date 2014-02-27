<?php 
class Task extends AppModel {

    public $useTable = 'tasks';

    public $active_arr = array('-9'=>'删除','-1'=>'失败','1'=>'待分配','2'=>'进行中','4'=>'完成');

    public $validate = array(
        'title' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '必须填写'
            )
        ),
    );
    public $belongsTo = array(
        'Worker' => array(
            'className' => 'User',
            'foreignKey' => 'worker_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
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
}
 ?>