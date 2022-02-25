<?php
/** @var /app/View/UsersView $this */
/** @property User $users */
/** @var User $users */
/** @var $this View */
/** @var array */
?>
<h1>サンプル2</h1>
<h2>ダッシュボード</h2>

<ul>
<!--	<li>--><?php //echo $this->Html->link('問い合わせ管理', array('controller'=>'conracts', 'action'=>'index')); ?><!--</li>-->
<!--	<br />-->
	<li><?php echo $this->Html->link('ユーザー管理', array('action'=>'userlist')); ?></li>
	<br />
	<li><?php echo $this->Html->link('ログアウト', array('action'=>'logout')); ?></li>
</ul>
