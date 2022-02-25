<?php
App::uses('AppController', 'Controller');
/**
 *  Kabus Controller
 *
 * @property Kabu $Kabu
 */
const API_PASS_TEST = 'apitest00998800';
const API_PASS_MAIN = 'apimain';

class KabusController extends AppController {
	/** Component　@var array　 */
	public $components = array('Paginator', 'Flash', 'Session');
	/** @var array */
	public $paginate = array(
	'limit' => 20,
	'modulus' => 15,
	'maxLimit' => 2000,
	'order' => array('id' => 'asc'));
	/** @var string[] */
	public $uses = array('kabu');

	public function index() {
		$this->Session->write('kabu.mt_mode', 'none');
		$this->Session->write('kabu.apikey', 'none');
		$this->Session->write('kabu.base_url', 'none');
		$this->redirect(array('action'=>'kabu'));
	}

	public function kabu($symbol='1578'){
		$mt_mode=$this->Session->read('kabu.mt_mode');
		$this->set(compact('mt_mode'));
		if (isset($this->request->data['kabu']['symbol']) || $this->request->is('POST') || $this->request->is('PUT')) {
			$symbol = ($this->request->data['kabu']['symbol']);
		// 銘柄紹介
			$this->kabuSymbol($symbol);
			$this->set(compact('symbol'));
		}
	}

	public function kabuToken($mt_mode='none'){
		$this->set('title_for_layout', $mt_mode . '暗証入力');
		$this->set(compact('mt_mode'));
		$this->Session->write('kabu.mt_mode', $mt_mode);
		if ($mt_mode === 'main') {
			$this->autoLayout = true;
			$this->autoRender = true;
			$base_url = "http://localhost:18080/kabusapi/"; //本番
		} else {
			$this->autoRender = false;
			$this->request->data['kabu']['pass_ent'] = '';
			$base_url = "http://localhost:18081/kabusapi/"; //検証用
		}
		$this->Session->write('kabu.base_ur', $base_url);
		if (isset($this->request->data['kabu']['pass_ent']) || $this->request->is('POST') || $this->request->is('PUT')) {
			$kent = ($this->request->data['kabu']['pass_ent']);
//			if (!$this->kabu->validates($kent)){
//			if (!$this->kabu->saveAll($this->request->data, array('validate' => 'only')))	{
//				exit($kent);
//			}
			$kent = $mt_mode==='main' ? API_PASS_MAIN . $kent : API_PASS_TEST;
			//トークン取得
			$option_array = array(
				'http' => array(
				'method' => "POST",
				'header' => "Content-type: application/json\r\nAccept: application/json",
				'content' => json_encode(['APIPassword' => $kent]),
				'ignore_errors' => true,
				'protocol_version' => '1.1',
				)
			);
			$json = @file_get_contents($base_url . 'token', false
			, stream_context_create($option_array));
			if (isset($http_response_header)) {
				if (!$pos = strpos($http_response_header[0], '200')) {
					echo '●http_response_header　の エラー●';
					debug($json);
					debug($http_response_header);
					exit;
				} else {
					echo "HTTPステータスコード($http_response_header[0]):API呼出し成功";
				}
			}
			if ($json === false) {
				echo 'HTTPステータスコード(' . $http_response_header[0] . ')';
				echo 'kabusapi/tokenを、オープンできませんでした。';
				exit(); // 終了させる
			}
			$response = json_decode($json, true);
			if ($response['ResultCode'] === 0) {
				$apikey = $response['Token'];
				$this->Session->write('kabu.apikey', $apikey);
			} else {
				// エラー処理
				debug('エラー処理');
				exit;
			}
			$this->redirect('kabu');
		}
	}

	public function kabuSymbol($symbol='1578', $market='1') {
		$mt_mode=$this->Session->read('kabu.mt_mode');
		$apikey=$this->Session->read('kabu.apikey');
		$base_url=$this->Session->read('kabu.base_ur');
		//  データの取得
		$url = $base_url . "symbol/{$symbol}@{$market}";
		$option_array = [
			'http' => [
				'method' => "GET",
				'header' => "Content-type: application/json\r\n" .
				"X-API-KEY: " . $apikey,
				'ignore_errors' => true,
				'protocol_version' => '1.1'
			]
		];
		$context = stream_context_create($option_array);
		$json = file_get_contents($url, false, $context);
		if (isset($http_response_header)) {
			$pos = strpos($http_response_header[0], '200');
			if ($pos === false) {
				var_dump($url);
				var_dump($json);
				var_dump($http_response_header);
//				debug('todoエラー処理');
				exit;
			}
		}
		if (!$json) {
			// エラー処理
			debug('todoエラー処理');
			exit;
		}
		$response = json_decode($json, true);
		var_dump($response);
		$this->render('kabu_symbol');
		$this->set(compact('mt_mode'));
	}
}


/* 1. HTTPステータスコード
200	OK	API呼出し成功
400	Bad Request	パラメータ不正
401	Unauthorized	認証エラー（トークン不正など）
403	Forbidden	アクセス権不正（APIキー不正、口座未開設、アクセス権不足URL呼出しなど）
404	Not Found	URL不正
429	Too Many Requests	スロットリング制限エラー
500	Internal Server Error	サーバ内部エラー
503	Service Unavailable	サービス制御（停止中）
*/



///**
// * tohome method
// */
//	public function tohome() {
//		$this->Paginator->settings = $this->paginate;
//		$this->set('tasks',	$this->Paginator->paginate());
//	}
//
///**
// * view method
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function view($id = null) {
//		if (!$this->Task->exists($id)) {
//			throw new NotFoundException(__('Invalid task'));
//		}
//		$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
//		$this->set('task', $this->Task->find('first', $options));
//	}
//
///**
// * add method
// *
// * @return void
// */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Task->create();
//			if ($this->Task->save($this->request->data)) {
//				$this->Flash->success(__('The task has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The task could not be saved. Please, try again.'));
//			}
//		}
//	}
//
///**
// * edit method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function edit($id = null) {
//		if (!$this->Task->exists($id)) {
//			throw new NotFoundException(__('Invalid task'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->Task->save($this->request->data)) {
//				$this->Flash->success(__('The task has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The task could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
//			$this->request->data = $this->Task->find('first', $options);
//		}
//	}
//
///**
// * delete method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function delete($id = null) {
//		if (!$this->Task->exists($id)) {
//			throw new NotFoundException(__('Invalid task'));
//		}
//		$this->request->allowMethod('post', 'delete');
//		if ($this->Task->delete($id)) {
//			$this->Flash->success(__('The task has been deleted.'));
//		} else {
//			$this->Flash->error(__('The task could not be deleted. Please, try again.'));
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
//}
