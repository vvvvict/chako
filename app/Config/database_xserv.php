<?php
class DATABASE_CONFIG {

	public $default = array(
//	public $xfree = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => '157.112.147.201',
		'login' => 'sot7_root',
		'password' => 'XFcupper68000',
		'database' => 'sot7_hirodb',
		'prefix' => '',
		'encoding' => 'utf8',
	);
//	public $default = array(
	public $sub = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'hirodb',
		'prefix' => '',
		'encoding' => 'utf8mb4',
	);

	public $test = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'tests',
		'prefix' => '',
		'encoding' => 'utf8mb4',
	);

//	public $new_db = array(
//		'datasource' => 'Database/Mysql',
//		'persistent' => false,
//		'host' => 'localhost',
////		'host' => '192.168.0.186',
//		'login' => 'root',
//		'password' => '',
//		'database' => 'hirodb',
//		'prefix' => '',
//		'encoding' => 'utf8mb4',
//	);
}
