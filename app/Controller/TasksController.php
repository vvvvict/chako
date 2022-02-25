<?php
App::uses('AppController', 'Controller');
App::uses('HttpSocket', 'Network/Http');
/**
 *  Tasks Controller
 * @property Task $Task
 * @property Old_task $Old_task
 * @property PaginatorComponent $Paginator
// * @property PaginatorHelper $Paginator
 */

class TasksController extends AppController
{
	public $uses = array(
		'Task',
		'Flash'
		);
	/**  @var */
//	public $paginate = array();
	public $paginate = array(
		'page' => 1,
//		'id' => 'desc',
		'limit' => 40,
		'maxLimit' => 10,
		'paramType' => 'named',
		'queryScope' => null,
		'order' => array(
			'id' => 'desc',
		)
	);	/**  @var */

/**
 * tohome method
 */
	public function index() {
		$this->layout = 'tasks_layout';
		//ページネーターでDB読み込み
		$this->Paginator->settings = $this->paginate;
		//クライアントのIPアドレスを取得
		$ip = $this->request->clientIp();
		$title = '塩田タスク＆覚え';
				$this->set('pageTitle', $title);

		$this->set(compact('ip'));
		$this->set('tasks',	$this->Paginator->paginate());
		$this->set('title', 'タイトル');
	}

/**
 * view method
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->layout = 'tasks_layout';
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * add method
//  * @return void
*/
	public function add() {
		$ip = $this->request->clientIp();
		$this->set(compact('ip'));
		$this->layout = 'tasks_layout';
		if ($this->request->is('post')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success('保存しました。');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('保存に失敗しました。');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 */
	public function edit($id = null) {
		$this->layout = 'tasks_layout';
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success('更新しました。');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error('更新に失敗しました。');
			}
		} else {
			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
			$this->request->data = $this->Task->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 */
	public function delete($id = null) {
//		$this->layout = 'tasks_layout';
		if ($this->request->is('get')) {
			//例外処理
			throw new MethodNotAllowedException();
		}
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}

//		if ($this->request->is('ajax')) {
//			if ($this->Task->delete($id)) {
//				//削除成功
//				//画面を更新せず、その行を じわっと消す処理
//				$this->autoRender = false;
//				$this->autoLayout = false;
//				$response = array('id' => $id);
//				$this->header('Content-Type: application/json');
//				echo json_encode($response);
//				exit();
//			}
//			//上手くいかなかった場合、トップページに移動する
//			return $this->redirect(array('action' => 'index'));
//		}

		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete($id)) {
//			$this->Flash->success(__('The task has been deleted.'));
			$this->Flash->success("No.{$id}を削除しました。");
		} else {
//			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
			$this->Flash->error("No.{$id}の削除に失敗しました。");
		}
		return $this->redirect(array('action' => 'index'));
	}
}
