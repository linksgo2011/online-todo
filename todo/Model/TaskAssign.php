<?php 
class TaskAssign extends AppModel {
    public $useTable = 'task_assigns';
   /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Task' => array(
            'className' => 'Task',
            'foreignKey' => 'task_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
 ?>