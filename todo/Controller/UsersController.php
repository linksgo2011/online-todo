<?php 
class UsersController extends AppController {

    public $layout = 'user';
    public $allow = array('register','login');

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public  function login( $action = '/tasks/index' ) {

        if ( $this->request->isPost() ) {
            $this->request->data['User']['email'] = trim( $this->request->data['User']['email'] );
            $this->request->data['User']['password'] = trim( $this->request->data['User']['password'] );

            $postData = $this->data;

            $email = $postData['User']['email'];
            $password = $postData['User']['password'];
            $this->User->recursive = -1;
            $this->User->cache=false;
            $user = $this->User->findByEmail( $email );
            if ( empty( $user ) && strlen( $email ) == 11 && is_numeric( $email ) ) {
                $user = $this->User->findByMobile( $email );
                if ( empty( $user ) ) {
                    $this->User->validationErrors = array(
                        'username' => array( "用户不存在" )
                    );
                    $this->error( '用户不存在' );
                    return;
                }
            }
            if ( $user['User']['password'] === $password ) {
                $this->UserAuth->login( $user );
                $uri = $this->Session->read( UserAuthComponent::originAfterLogin );
                if ( !$uri ) {
                    $uri = $action;
                }
                CakeSession::delete( 'Message.flash' );
                $this->Session->delete( UserAuthComponent::originAfterLogin );
                $this->redirect( $uri );
            }
            $this->User->validationErrors = array(
                'password' => array( "密码错误" )
            );
            $this->error( '密码错误' );
            return;
        }
    }

    public function logout() {
        $this->UserAuth->logout();
        $this->redirect( array( 'action' => 'login' ) );
    }
}
 ?>