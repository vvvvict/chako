<?php
App::uses('AppModel', 'Model');
/**
 *
 * task Model
 *
 */
class Task extends AppModel {
//	public $useTable='tasks';

	public function readTask(){
//		$this->setDataSource('default');//DB変更
//		$this->setDataSource('new_db');//DB変更
 		$this->recursive = 0;
}
/**
 * Validation rules
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
//		'body' => array(
//			'notBlank' => array(
//				'rule' => array('notBlank'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
	);
}
