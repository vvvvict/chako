<?php
App::uses('AppController', 'Controller');
/**
 *  Tasks Controller
 *
 * @property Task $Task
 * @property Old_task $Old_task
 * @property PaginatorComponent $Paginator
 */
class TasksController extends AppController {

/**
 * Components
 * @var array
 */
	public $components = array(
		'Paginator',
		'Flash'
	);

	/**
	 * @var array
	 */
	public $paginate = array(
		'limit' => 5,
		'maxLimit' => 20000,
//		'Article' => array('queryScope' => 'articles'),
//		'Tag' => array('queryScope' => 'tags'),
//    'paramType' => 'named',
//    'queryScope' => null,
		'order' => array('id' => 'asc'
		)
	);
	/**
	 * @var string[]
	 */
	public $uses = array(
		'Task',
		'Old_task'
	);
	/**
	 * @var
	 */
	public $scaffold;

/**
 * index method
 *
// * @return void
 */
	public function index() {
//		$this->loadModel('Old_task');
		$this->Paginator->settings = $this->paginate;
//	$this->Task->setDataSource('new_db');//DB変更
//		$this->Task->readTask();
//		$this->Old_task->readTask();
		$this->set('tasks',	$this->Paginator->paginate());
//		$this->set('tasks',	$this->Paginator->paginate('Old_task'));
//		$this->set('tasks',		$this->Paginator->paginate());
//		$this->set('old_tasks',		$this->Paginator->paginate('Old_task'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
		$this->set('task', $this->Task->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Task->create();
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Task->save($this->request->data)) {
				$this->Flash->success(__('The task has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The task could not be saved. Please, try again.'));
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
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Task->exists($id)) {
			throw new NotFoundException(__('Invalid task'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Task->delete($id)) {
			$this->Flash->success(__('The task has been deleted.'));
		} else {
			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
