<?php
App::uses('AppController', 'Controller');

/**
 *  Users Controller
 * @property User $User
// * @property user $user
 */

class UsersController extends AppController {

	public $uses = array(
		'User',
		'Flash'
//		'Auth',
	);

	public function beforeFilter()
	{
		parent::beforeFilter();
		$this->Auth->allow('add');
	}

	public function login(){
		$this->layout = 'tasks_layout';
		if($this->request->is('post')) {
//		if($this->request->isPost()) {
			if($this->Auth->login()) {
//				return $this->redirect($this->Auth->redirectUrl());
				$this->Flash->success('ログインしました。');
				$this->redirect(array('controller'=>'tasks', 'action' => 'index'));
			} else {
				$this->Flash->error( 'ユーザー名または、パスワードが違います。');
//				$this->Session->setFlash( 'ユーザー名または、パスワードが違います。');
			}
		}
	}

	public function logout(){
		$this->layout = 'tasks_layout';
		$this->Flash->success('ログアウトしました。');
		$this->Auth->logout();
		//ログインページへ戻る。
		$this->render('login');
	}

	public function index() {
		$this->layout = 'tasks_layout';
			$this->set('userlist', $this->User->find('list', array('fields'=>'username', 'order'=>'username ASC')));
//		$aaa = 12345;
//		$aaa = $this->Validation::luhn($aaa, true);
//		$aaa = $this->referer();
//		debug($aaa);exit;
	}

	public function userlist() {
		$this->layout = 'tasks_layout';
		$userData = $this->paginate();
		$this->set(compact('userData'));
	}

	public function view($id) {
		$this->layout = 'tasks_layout';
		$userData = $this->User->findById($id);
		if(empty($userData)) {
//			$this->Session->setFlash('ユーザーが見つかりませんでした。');
			$this->Flash->error('ユーザーが見つかりませんでした。');
			$this->redirect(array('action'=>'userlist'));
		}
		$this->set(compact('userData'));
	}

	public function add() {
		return $this->edit();
	}

	public function edit($id = null) {
		$this->layout = 'tasks_layout';
		if($this->request->is('post') || $this->request->is('put')) {
			if($id !== null ) {
				if($this->request->data[$this->User->alias]['password'] == '' ) {
					unset($this->request->data[$this->User->alias]['password']);
				}
			}
//			$aaa = $this->User->isUnique($this->request->data[$this->User->alias]);
//			debug($aaa);
//			if (!$aaa = $this->User->isUnique($this->request->data[$this->User->alias])) {
////			debug($aaa);exit;
//				$this->Session->setFlash('そのユーザー名はすでに使われています。');
//			} else
//			$this->User->set($this->request->data);
//			$aaa = $this->User->validates();
//			if(!$aaa){
//				$this->redirect('error_page');
//				return;
//			}
			$aa = $this->request->data[$this->User->alias]['password'] = $this->User->bs($this->request->data);
debug($aa);
//;xit;
			if($this->User->save($this->request->data)) {
//				$this->Session->setFlash('ユーザー情報を保存しました。');
				$this->Flash->set('ユーザー情報を保存しました１。');
				$this->Flash->success('ユーザー情報を保存しました２。');
				$this->redirect(array('action'=>'userlist'));
			} else {
//				debug($this->User->validationErrors);
//				$this->Session->setFlash('入力に間違いがあります。');
				$this->Flash->error('入力に間違いがあります。');
			}
		} else {
			if($id !== null) {
				$this->request->data = $this->User->findById($id);
				unset($this->request->data[$this->User->alias]['password']);

				if(empty($this->request->data)) {
//					$this->Session->setFlash('ユーザーが見つかりませんでした。');
					$this->Flash->error('ユーザーが見つかりませんでした。');
					$this->redirect(array('action'=>'userlist'));
				}
			}
		}

		$this->render('edit');
	}

	public function delete($id) {
		if($this->request->isDelete()) {
			if($this->User->delete($id)) {
//				$this->Session->setFlash('ユーザーを削除しました。');
				$this->Flash->set('ユーザーを削除しました。');
				$this->redirect(array('action'=>'userlist'));
			}
			$this->Flash->error('ユーザーの削除に失敗しました。');
			$this->redirect(array('action'=>'userlist'));

		} else {
			$this->request->data =$this->User->findById($id);
			if (empty($this->request->data)) {
//				$this->Session->setFlash('ユーザーが見つかりませんでした。');
				$this->Flash->error('ユーザーが見つかりませんでした。');
				$this->redirect(array('action'=>'userlist'));
			}
		}
	}

}
