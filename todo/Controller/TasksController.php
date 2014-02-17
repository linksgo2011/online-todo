<?php 
class TasksController extends AppController {

	public $layout = 'default';
	public $uses = array('Task','TaskAssign','Log','Comment','User');
    public $components = array(
        'Mfs',
    );

	public function index(){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];

		if($this->request->isPost()){
			$this->request->data['Task']['publisher_id'] = $user_id;
			$result = $this->Task->save($this->request->data);
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
				$this->redirect(array('action'=>'task_list'));
			}
		}

		$this->set('user_arr',$user_arr);
		$this->set('active_arr',$this->Task->active_arr);
		$this->set('task_type_arr',$this->Task->task_type_arr);
		$this->set('platform_arr',$this->Task->platform_arr);
		$this->set('important_level_arr',$this->Task->important_level_arr);
		$this->set('priority_arr',$this->Task->priority_arr);

	}

	/**
	 * 编辑任务
	 */
	public function edit($id){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];
		$user_arr = $this->User->user_list(2);

		$task = $this->Task->find('first',array(
			'conditions'=>array('id'=>$id),
			'recursive'=>2
		));

		$this->loadModel('TaskAssign');
		//获取参与用户
		$task_assign_users = $this->TaskAssign->find('list',array(
			'fields'=>array('TaskAssign.user_id','User.usrname'),
			'joins'=>array(
                array(
                    'table' => 'user',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'TaskAssign.user_id = User.usr_id',
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

		if($this->request->isput()){
			$result = $this->Task->save($this->request->data);
			if($result){
				$this->succ('任务已经更新！');
				//记录日志
				$log = array(
					'name'=>'更新任务',
					'user_id'=>$user_id,
					'task_id'=>$id
				);
				$this->loadModel('Log');
				$this->Log->save($log);
				$this->redirect(array('action'=>'edit',$id));
			}
		}

	   if(!$this->request->data) {
	        $this->request->data = $task;
	    }
		$this->set('user_arr',$user_arr);
		$this->set('active_arr',$this->Task->active_arr);
		$this->set('task_type_arr',$this->Task->task_type_arr);
		$this->set('platform_arr',$this->Task->platform_arr);
		$this->set('important_level_arr',$this->Task->important_level_arr);
		$this->set('priority_arr',$this->Task->priority_arr);
		$this->set(compact('task_assign_users','id','task','comments'));
	}


	/**
	 * 查看任务
	 */
	public function view($id){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];
		$user_arr = $this->User->user_list(2);

		$task = $this->Task->find('first',array(
			'conditions'=>array('id'=>$id),
			'recursive'=>2
		));

		$this->loadModel('TaskAssign');
		//获取参与用户
		$task_assign_users = $this->TaskAssign->find('list',array(
			'fields'=>array('TaskAssign.user_id','User.usrname'),
			'joins'=>array(
                array(
                    'table' => 'user',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'TaskAssign.user_id = User.usr_id',
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
	
	/**
	 *分配任务
	 */
	public function assign($task_id,$user_id){
		$task = $this->Task->findById($id);
		$hasAny = $this->TaskAssign->hasAny(array('task_id'=>$task_id,'user_id'=>$user_id));
		if($hasAny){
			$this->error('已经分配');
		}else{
			$data = array(
				'task_id'=>$task_id,
				'user_id'=>$user_id,
			);
			if($this->TaskAssign->save($data)){
				$user = $this->UserAuth->getUser();

				$this->Task->id = $task_id;
				$task = $this->Task->read();
				if($task["Task"]['active'] == 1){
					$this->Task->saveField('active','2');
				}

				$user_id = $user['User']['usr_id'];
				$log = array(
					'name'=>'分配任务',
					'user_id'=>$user_id,
					'task_id'=>$task_id
				);
				$this->loadModel('Log');
				$this->Log->save($log);
				$this->succ('分配成功');
			}
		}
		$this->redirect($this->referer());
	}

	/**
	 * 取消分配
	 */
	public function un_assign($task_id,$user_id){
		$task = $this->Task->findById($id);
		$hasAny = $this->TaskAssign->find('first',array('conditions'=>array('task_id'=>$task_id,'user_id'=>$user_id)));
		if(!$hasAny){
			$this->error('还没有分配');
		}else{
			$this->TaskAssign->deleteAll(array('task_id'=>$task_id,'user_id'=>$user_id));
			if($this->TaskAssign->getAffectedRows() > 0){
				$user = $this->UserAuth->getUser();
				$user_id = $user['User']['usr_id'];
				$log = array(
					'name'=>'取消分配任务',
					'user_id'=>$user_id,
					'task_id'=>$task_id
				);
				$this->loadModel('Log');
				$this->Log->save($log);
				$this->succ('取消分配任务成功');
			}
		}
		$this->redirect($this->referer());
	}

	public function del($task_id = 0){
		$this->Task->id = $task_id;
		$this->Task->read();

		if($this->Task->saveField('active',-1)){
			$this->succ('任务已经删除');
			$user = $this->UserAuth->getUser();
			$user_id = $user['User']['usr_id'];
			$log = array(
				'name'=>'删除任务',
				'user_id'=>$user_id,
				'task_id'=>$task_id
			);
			$this->loadModel('Log');
		}else{
			$this->error('任务失败');
		}
		$this->redirect(array('action'=>'task_list'));
	}

	/**
	 * 系列快捷方法
	 */
	public function deny($task_id = 0){
		$this->Task->id = $task_id;
		$this->Task->read();

		if($this->Task->saveField('active',5)){
			$this->succ('任务已经拒绝');
			$user = $this->UserAuth->getUser();
			$user_id = $user['User']['usr_id'];
			$log = array(
				'name'=>'拒绝任务',
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
			$user_id = $user['User']['usr_id'];
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

	public function assign_me($task_id = 0){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];
		$this->assign($task_id,$user_id);
	}

	//任务列表
	public function task_list(){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];
		$user_arr = $this->User->find('list',array(
			'fields'=>array('User.usr_id','User.usrname'),
			'conditions'=>array('active>0'),
		));

		$conditions = array();
		$query = $this->request->query;
		if($query['active']){
			$conditions['Task.active'] = $query['active'];
		}
		if($query['task_type']){
			$conditions['Task.task_type'] = $query['task_type'];
		}
		if($query['platform']){
			$conditions['Task.platform'] = $query['platform'];
		}
		if($query['important_level']){
			$conditions['Task.important_level'] = $query['important_level'];
		}	
		if($query['priority']){
			$conditions['Task.priority'] = $query['priority'];
		}	

		if($query['assign']){
			$conditions['TaskAssign.user_id'] = $query['assign'];
		}

		$conditions[] = 'Task.active>0';
		$this->request->data = array('Task'=>$query);

        $this->paginate = array(
        	'fields'=>array('DISTINCT Task.id','Task.*','User.*'),
			'joins'=>array(
                array(
                    'table' => 'task_assigns',
                    'alias' => 'TaskAssign',
                    'type' => 'left',
                    'conditions' => array(
                        'TaskAssign.task_id = Task.id',
                    )
                ),
                array(
                    'table' => 'user',
                    'alias' => 'User',
                    'type' => 'inner',
                    'conditions' => array(
                        'Task.publisher_id = User.usr_id',
                    )
                ),
            ),
			'recursive'=>-1,
            'order' => 'Task.active asc,id desc',
            'limit'=>20,
            'conditions'=>$conditions
        );		
        $data = $this->paginate();

		$this->loadModel('TaskAssign');
		foreach ($data as $key => $one) {
			# code...
			$id = $one['Task']['id'];
			$task_assign_users = $this->TaskAssign->find('list',array(
				'fields'=>array('TaskAssign.user_id','User.usrname'),
				'joins'=>array(
	                array(
	                    'table' => 'user',
	                    'alias' => 'User',
	                    'type' => 'inner',
	                    'conditions' => array(
	                        'TaskAssign.user_id = User.usr_id',
	                    )
	                ),
	            ),
	            'conditions'=>array('TaskAssign.task_id'=>$id)
			));
			$data[$key]['task_assign_users'] = $task_assign_users;
		}
		//获取参与用户


		$this->set('active_arr',$this->Task->active_arr);
		$this->set('task_type_arr',$this->Task->task_type_arr);
		$this->set('platform_arr',$this->Task->platform_arr);
		$this->set('important_level_arr',$this->Task->important_level_arr);
		$this->set('priority_arr',$this->Task->priority_arr);
		$this->set(compact('data','user_arr','task_assign_users'));
	}

	public function comment($task_id = 0){
		$user = $this->UserAuth->getUser();
		$user_id = $user['User']['usr_id'];

		$this->request->data['Comment']['user_id'] = $user_id;
		$this->request->data['Comment']['task_id'] = $task_id;
		$result = $this->Comment->save($this->request->data);
		if($result){
			$this->succ('评论成功！');
		}else{
			$this->error('评论失败！');
		}
		$this->redirect($this->referer());
	}

	//图片上传
    public function ajaxAdd(){
        if ($this->request->is('post') || $this->request->is('ajax')) {
            $post = $this->request->data;
            list($rs, $error, $key) = $this->_upload($_FILES['imgFile'], 1);
            if (!$rs || !$key) {
                echo json_encode(array('error' => 1, 'message' => "失败，原因：".$error));
                $this->_stop();
            }
            $src = $this->Mfs->download($key);
            echo json_encode(array('error' => 0, 'url' => $src));
            $this->_stop();
        }
       	echo json_encode(array('error' => 1, 'message' => "没有上传"));
        $this->_stop();
    }

    private function _upload($file, $type_id = 1) {
        $type_exts = array(
            1 => array(
                'gif',
                'jpg',
                'jpeg',
                'png',
                'bmp'
            )
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
            if (!isset($type_exts[$type_id]) || in_array($file_ext, $type_exts[$type_id]) === false) {
                return array(
                    false,
                    "上传文件扩展名是不允许的扩展名。\n只允许" . implode(",", $type_exts[$type_id]) . "格式。",
                    null
                );
            }

            //新文件名
            $msf_key = 'todo/res/' . date("YmdHis") . '_' . rand(10000, 99999) . '.' . $file_ext;
            if (!$this->Mfs->upload($msf_key, $tmp_name)) {
                sleep(1);
                if (!$this->Mfs->upload($msf_key, $tmp_name)) {
                    
                    return array(
                        false,
                        '上传文件失败。',
                        null
                    );
                }
            }
            
            return array(
                true,
                null,
                $msf_key
            );
        }
        
        return array(
            false,
            "没有上传文件",
            null
        );
    }

}
 ?>