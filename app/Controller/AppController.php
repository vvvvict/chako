<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array(
			'DebugKit.Toolbar',
			'Auth'=>array(
				'authenticate' => array(
					'all' => array(
						'fields' => array(
							'username' => 'username',
							'password' => 'password',
						),
					),
					'Form',
				),
			),
			'Session',
			'Paginator',
			'Flash',
	);
/** @var array */

	public $paginate = array(
	'limit' => 12,
	'modulus' => 15,
	'maxLimit' => 2000,
	'order' => array('modified' => 'desc'));
/** @var string[] */

/**
 * @return void
 * @link https://book.cakephp.org/2.0/en/controllers.html#request-life-cycle-callbacks
 */
	public function beforeFilter() {
//	parent::beforeFilter();
		// 国際言語化で、途中で切り替えできるようにする場合。
		if ($this->Session->check('Config.language')) {
				Configure::write('Config.language', $this->Session->read('Config.language'));
		}
	}

public function __construct($request = null, $response = null) {
    if (CakePlugin::loaded('DebugKit')) {
        $this->components[] = 'DebugKit.Toolbar';
        if (CakePlugin::loaded('PrettyDebug')) {
            $this->components[] = 'PrettyDebug.PrettyDebug';
        }
    }
    parent::__construct($request, $response);
}
}
