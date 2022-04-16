<?php
// \app\Model\Datasource\Database\MysqlLog.php
App::uses( 'Mysql', 'Model/Datasource/Database');
class MysqlLog extends Mysql {
	function logQuery( $sql, $params = array()) {
		parent::logQuery( $sql);
		if (Configure::read('Cake.logQuery')) {
//			$this->log( $this->_queriesLog, LOG_DEBUG);  // SQLの実行詳細
			$this->log( $sql, LOG_DEBUG);                // SQLクエリーのみ
		}
	}
}
