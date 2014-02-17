<?php 
class User extends AppModel {

    public $useTable = 'user';
    public $primaryKey = 'usr_id';

    public $validate = array(
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '必须填写'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => '必须填写'
            )
        ),
    );

    public function user_list($project = 2){
        return $this->find('list',array(
            'fields'=>array('User.usr_id','User.usrname'),
            'conditions'=>array('active>0','User.project'=>$project)
        ));
    }
}
 ?>