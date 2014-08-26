<?php 
class TasksController extends AppController {

	public $layout = 'admin';
    var $prefixLayout = true;

	public $uses = array('Task','TaskAssign','Log','Comment','User');

	public function index(){   
        $this->layout = "default";
        $this->loadModel("User");
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];
        $conditions = array(
            'Task.active>=-1',
            'Task.worker_id'=>$user_id
        );
        $this->paginate = array(
            'fields'=>array('Task.*,TaskAssign.*'),
            'conditions'=>$conditions,
            'joins'=>array(
                array(
                    'table'=>'task_assigns',
                    'alias'=>"TaskAssign",
                    'type'=>'inner',
                    'conditions'=>array(
                        'TaskAssign.task_id=Task.id',
                        'TaskAssign.user_id'=>$user_id
                    )
                )
            ),
            'recursive'=>-1,
            'order' => 'Task.active asc,Task.id desc',
            'limit'=>20,
        );      
        $data = $this->paginate();
        $this->set('data',$data);
        $this->set('active_arr',$this->Task->active_arr);

        //接单日志
        $task_assigns = $this->TaskAssign->find('all',array(
            'conditions'=>array(
                'TaskAssign.user_id'=>$user_id,
            ),
            'order'=>array('TaskAssign.id desc')
        ));
        $this->set('task_assigns',$task_assigns);
        //修改
        if ($this->request->isPost()) {
            $post_data = $this->request->data;
            if ($post_data['User']['password'] != $post_data['User']['cpassword']) {
                $this->warning("密码和重复密码必须一致");
                return;
            }
            if(!$post_data['User']['password']){
                $this->warning("密码不能为空");
                return; 
            }
            $this->User->id = $user_id;
            if($this->User->saveField('password',$post_data['User']['password'])){
                $this->succ("修改成功");
                $this->redirect($this->referer());
            }else{
                $this->warning("修改失败");
                return;
            }

        }
	}

	/**
	 * 查看任务
	 */
	public function view($id){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['id'];
		$user_arr = $this->User->user_list(2);

		$task = $this->Task->find('first',array(
			'conditions'=>array('id'=>$id),
			'recursive'=>2
		));

		$this->loadModel('TaskAssign');
		//获取参与用户
		$task_assign_users = $this->TaskAssign->find('list',array(
			'fields'=>array('TaskAssign.user_id','User.name'),
			'joins'=>array(
                array(
                    'table' => 'user',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'TaskAssign.user_id = User.id',
                    )
                ),
            ),
            'conditions'=>array('TaskAssign.task_id'=>$id)
		));

		//评论列表
		$comments = $this->Comment->find('all',array(
			'fields'=>array('Comment.*'),
			'conditions'=>array('Comment.task_id'=>$id),
			'recursive'=>2
		));

		$this->set('user_arr',$user_arr);
		$this->set('active_arr',$this->Task->active_arr);
		$this->set('task_type_arr',$this->Task->task_type_arr);
		$this->set('platform_arr',$this->Task->platform_arr);
		$this->set('important_level_arr',$this->Task->important_level_arr);
		$this->set('priority_arr',$this->Task->priority_arr);
		$this->set(compact('task_assign_users','id','task','user_id','comments'));
	}
	

    public function admin_add()
    {
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];

        if($this->request->isPost()){
            $post_data = $this->request->data;
            $post_data ['Task']['active'] = 1;

            if ($post_data['Task']['doc']) {
                list($result,$error,$url) = $this->_upload($post_data['Task']['doc']);
                $post_data['Task']['doc'] = $url;
            }
            $result = $this->Task->save($post_data);

            if($result){
                $this->succ('任务创建成功！');
                //记录日志
                $log = array(
                    'name'=>'创建任务',
                    'user_id'=>$user_id,
                    'task_id'=>$result['Task']['id']
                );
                $this->loadModel('Log');
                $this->Log->save($log);
                $this->redirect(array('action'=>'index','admin'=>true));
            }else{
                $this->error("添加失败");
                return;
            }
        }
        $this->set('user_arr',$user_arr);
        $this->set('active_arr',$this->Task->active_arr);
    }

    public function admin_edit($id=null)
    {
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];
        $this->set('user_arr',$user_arr);
        $this->set('active_arr',$this->Task->active_arr);
        if($this->request->isPut()){
            $post_data = $this->request->data;
            if ($post_data['Task']['doc']['tmp_name']) {
                list($result,$error,$url) = $this->_upload($post_data['Task']['doc']);
                $post_data['Task']['doc'] = $url;
            }else{
                unset($post_data['Task']['doc']);
            }
            $result = $this->Task->save($post_data);

            if($result){
                $this->succ('保存成功');
                $this->redirect($this->referer());
            }else{
                $this->error("保存失败");
                return;
            }
        }else{
            $this->request->data = $this->Task->findById($id);
        }

    }

    /**
     * 查看任务
     */
    public function admin_view($id){
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];
        $user_arr = $this->User->user_list(2);

        $task = $this->Task->find('first',array(
            'conditions'=>array('Task.id'=>$id),
            'recursive'=>0
        ));
        $this->loadModel('TaskAssign');
        //获取参与用户
        $task_assign_users = $this->TaskAssign->find('all',array(
            'fields'=>array('TaskAssign.*','User.name','User.id'),
            'joins'=>array(
                array(
                    'table' => 'users',
                    'alias' => 'User',
                    'type' => 'inner',  
                    'conditions' => array(
                        'TaskAssign.user_id = User.id',
                    )
                ),
            ),
            'conditions'=>array('TaskAssign.task_id'=>$id),
            'recursive'=>-1
        ));
        $this->set('user_arr',$user_arr);
        $this->set('active_arr',$this->Task->active_arr);
        $this->set(compact('task_assign_users','id','task','user_id'));
    }

    public function admin_index(){
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];
        $conditions = array(
                'Task.active>0'
            );
        $query = $this->request->query;
        if ($query['title']) {
            $conditions['title like'] = "%".$query['title']."%";
        }
        if ($query['active'] != "") {
            $conditions['active'] = $query['active'];
        }
        $this->request->data['Task'] = $query;
        $this->paginate = array(
            'fields'=>array('Task.*',"(select count(1) from task_assigns where task_id = Task.id) as count"),
            'recursive'=>-1,
            'order' => 'Task.active asc,id desc',
            'limit'=>20,
            'conditions'=>$conditions
        );      
        $data = $this->paginate();
        $this->set('data',$data);
        $this->set('active_arr',$this->Task->active_arr);
    }

    /**
     * 管理员确认分配
     */
    public function admin_take_assign($task_id,$user_id)
    {
        // $sql = "update users set point = point + (select point from task_assigns where task_id = {$task_id} and user_id = user.id)"
        $sql = "update users,task_assigns set users.point = users.point + task_assigns.point where users.id = task_assigns.user_id and task_id = {$task_id} and users.id != {$user_id}";
        $this->Task->query($sql);
        $this->Task->id = $task_id;
        $this->Task->saveField('worker_id',$user_id);
        $this->Task->saveField('active',2);
        $this->succ("采纳完成!");
        $this->redirect($this->referer());
    }

	/**
	 *分配任务
	 */
	public function assign($task_id){
        $this->layout = "default";
        $user_id = $this->UserAuth->getUserId();
        $user = $this->User->read(null,$user_id);
        $task = $this->Task->findById($task_id);
        if (!$task) {
            throw new NotFoundException("404", 1);
        }
        $data = $this->TaskAssign->find('all',array(
            'conditions'=>array('task_id'=>$task_id),
        ));

        $this->set('current_user',$user['User']);
        $this->set('data',$data);
        $this->set('task',$task);
        if ($this->request->isPost()) {
    		$hasAny = $this->TaskAssign->hasAny(array('task_id'=>$task_id,'user_id'=>$user_id));
    		if($hasAny){  
    			$this->warning('已经申请');
                return;
    		}else{
                $post_data = $this->request->data;
                $point = $post_data['Task']['point']?$post_data['Task']['point']:0;
    			$data = array(
    				'task_id'=>$task_id,
    				'user_id'=>$user_id,
                    'point'=>$point
    			);
                if ($point  > $user['User']['point']) {
                    $this->warning("积分不足");
                    return;
                }
    			if($this->TaskAssign->save($data)){
                    $this->User->updateAll(array('point'=>"point - {$point}"),array('id'=>$user_id));
    				$this->UserAuth->flashUser($user_id);
                    $this->succ('申请成功');
                    $this->emailTo(print_r($this->UserAuth->getUser(),true));
    			}else{
                    $this->warning("申请失败");
                }
            }
            $this->redirect($this->referer());
		}
	}

    /**
     *查看客户信息
     */
    public function view_info($task_id){
        $this->layout = "ajax";
        $user_id = $this->UserAuth->getUserId();
        $user = $this->User->read(null,$user_id);
        $task = $this->Task->findById($task_id);
        if (!$task) {
            throw new NotFoundException("404", 1);
        }

        $point = $task['Task']['point'];

        if ($user['User']['point'] < $point) {
            echo "积分不足！";
            exit();
        }
        $this->User->updateAll(array('point'=>"point - {$point}"),array('id'=>$user_id));
        $this->UserAuth->flashUser($user_id);
        $this->set(compact('task'));
    }

    /**
     * 编辑进度
     */
    public function edit_schel($id=null)
    {
        $this->layout = "default";
        $user = $this->UserAuth->getUser();
        $user_id = $user['User']['id'];

        $task = $this->Task->read(null,$id);
        if ($task['Task']['worker_id'] != $user_id) {
            $this->warning("没有接到此任务，不能上传");
            $this->redirect($this->referer());
        }
        $this->set('user_arr',$user_arr);
        $this->set('active_arr',$this->Task->active_arr);
        if($this->request->isPut()){
            $post_data = $this->request->data;
            if ($post_data['Task']['doc']) {
                list($result,$error,$url) = $this->_upload($post_data['Task']['doc']);
                $post_data['Task']['doc'] = $url;
            }
            $result = $this->Task->save($post_data);

            if($result){
                $this->succ('保存成功');
                $this->redirect($this->referer());
            }else{
                $this->error("保存失败");
                return;
            }
        }else{
            $this->request->data = $this->Task->findById($id);
        }
    }

	public function admin_delete($task_id = 0){
		$this->Task->id = $task_id;
		$this->Task->read();

		if($this->Task->saveField('active',-1)){
			$this->succ('任务已经删除');
			$user = $this->UserAuth->getUser();
			$user_id = $user['User']['id'];
			$log = array(
				'name'=>'删除任务',
				'user_id'=>$user_id,
				'task_id'=>$task_id
			);
			$this->loadModel('Log');
		}else{
			$this->error('任务失败');
		}
		$this->redirect($this->referer());
	}

	//通用状态修改方法
	public function alt_active($task_id = 0,$active = 0){
		$this->Task->id = $task_id;
		$this->Task->read();

		switch ($active) {
			case 3:
				//进入 测试阶段
				$with_time = $this->request->query['with_time'];
				$log_name = '申请任务测试,耗时'.$with_time.'小时';
				$this->Task->set('with_time',$with_time);
				break;
			case 4:
				//完成操作
				$log_name = '测试完成，结束了任务';
				$this->Task->set('end_time',date('Y-m-d H:m:s'));
				break;
			case 5:
				//拒绝
				$reject = $this->request->query['reject'];
				$this->Task->set('reject',$reject);
				$log_name = '拒绝任务,理由为:'.$reject;
				break;
			case 6:
				//测试失败
				$log_name = '测试没有通过这个任务';
				break;
			default:
				break;
		}
		
		$this->Task->set('active',$active);
		if($this->Task->save()){
			$this->succ('操作成功！');
			$user = $this->UserAuth->getUser();
			$user_id = $user['User']['id'];
			$log = array(
				'name'=>$log_name,
				'user_id'=>$user_id,
				'task_id'=>$task_id
			);
			$this->loadModel('Log');
			$this->Log->save($log);
		}else{
			$this->error('任务操作失败');
		}
		$this->redirect(array('action'=>'task_list'));
	}

	//图片上传
    public function ajaxAdd(){
        if ($this->request->is('post') || $this->request->is('ajax')) {
            $post = $this->request->data;
            list($rs, $error, $url) = $this->_upload($_FILES['imgFile'], 1);
            if (!$rs || !$url) {
                echo json_encode(array('error' => 1, 'message' => "失败，原因：".$error));
                $this->_stop();
            }
            // $url = $url;
            echo json_encode(array('error' => 0, 'url' => $url));
            $this->_stop(); 
        }
       	echo json_encode(array('error' => 1, 'message' => "没有上传"));
        $this->_stop();
    }

    private function _upload($file) {
        $type_exts = array(
            'gif',
            'jpg',
            'jpeg',
            'png',
            'bmp',
            'doc',
            'txt',
            'rar',
            'zip',
            'wps',
            'ps'
        );
        $max_size = 31457280;
        if (!empty($file['error'])) {
            
            switch ($file['error']) {
                case '1':
                    $error = '超过php.ini允许的大小。';
                    break;

                case '2':
                    $error = '超过表单允许的大小。';
                    break;

                case '3':
                    $error = '图片只有部分被上传。';
                    break;

                case '4':
                    $error = '请选择图片。';
                    break;

                case '6':
                    $error = '找不到临时目录。';
                    break;

                case '7':
                    $error = '写文件到硬盘出错。';
                    break;

                case '8':
                    $error = 'File upload stopped by extension。';
                    break;

                case '999':
                default:
                    $error = '未知错误。';
            }
            
            return array(
                false,
                $error,
                null
            );
        }
        if (empty($file) === false) {
            $file_name = $file['name'];
            $tmp_name = $file['tmp_name'];
            $file_size = $file['size'];
            if (!$file_name) {
                
                return array(
                    false,
                    '请选择文件。',
                    null,
                );
            }
            if (@is_uploaded_file($tmp_name) === false) {
                
                return array(
                    false,
                    '上传失败。',
                    null,
                );
            }
            if ($file_size > $max_size) {
                
                return array(
                    false,
                    '上传文件大小超过限制。',
                    null
                );
            }
            //获得文件扩展名
            $_tmp = explode(".", $file_name);
            $file_ext = array_pop($_tmp);
            $file_ext = strtolower($file_ext);
            //检查扩展名
            if (in_array($file_ext, $type_exts) === false) {
                return array(
                    false,
                    "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $type_exts[$type_id]) . "格式。",
                    null
                );
            }

            //新文件名
            $msf_key = 'doc/' . date("YmdHis") . '_' .rand() . '.' . $file_ext;
            $url = '/'.$msf_key;
            if (move_uploaded_file($tmp_name,WWW_ROOT.$msf_key)) {
                return array(
                    true,
                    null,
                    $url
                );
            }else{
                return array(
                    true,
                    "上传失败",
                    null
                );
            }
        }
        
        return array(
            false,
            "没有上传文件",
            null
        );
    }
}
 ?>