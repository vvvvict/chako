<?php
/** @var /app/View/UsersView $this */
/** @property User $users */
/** @var User $users */
/** @var $this View */
/** @var array */
?>
<h1>サンプル2</h1>
<h2>ユーザ管理</h2>
<h3>ユーザ詳細</h3>

<table>
	<tr>
		<th>ID</th>
		<td><?php echo h($userData['User']['id']); /** @ver */?></td>
	</tr>

	<tr>
		<th>ユーザ名</th>
		<td><?php echo h($userData['User']['username']); /** @ver */?></td>
	</tr>

</table>

<div class="pageLinks">
	<p><?php echo $this->Html->link('戻る', array('action'=>'userlist')); ?></p>
</div>
