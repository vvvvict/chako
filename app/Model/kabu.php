<?php
App::uses('AppModel', 'Model');
/** kabu Model */

class kabu extends AppModel
{
	var $name = 'kabu';
	public $useTable = false;
	/**
	 * Validation rules
	 * @var array
	 */
	public $validate = array(
	'pass_ent' => array(
	array(
		'rule' => 'alphaNumeric',
		'message' => '半角英数で入力してください',
//				'rule'       => 'notEmpty',
//				'message'    => '暗証フレーズを入力してください',
//		'required' => true,
//		'allowEmpty' => false,
	),
	array(),
	),
	);
	public $_schema = array(
	'pass_ent' => array(
	'type' => 'string',
	'length' => '5',
	),
	);

	/**
	 * バリデーション実行
	 */
	function register_validation($data = array())
	{
		if (isset($this->data[$this->name])) {
			$data = $this->data[$this->name];
		} else {
			$data = $this->data;
		}
		$result = parent::validates($data);
		if ($result) {
			return true;
		}
		return false;
	}
}
