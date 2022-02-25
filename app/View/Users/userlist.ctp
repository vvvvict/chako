<?php
/** @var /app/View/UsersView $this */
/** @property User $users */
/** @var User $users */
/** @var $this View */
/** @var User $userData */
/** @var array */
?>
<!--<h1>サンプル2</h1>-->
<!--<h2>ユーザー管理</h2>-->
<h2>ユーザー 一覧</h2>
<?php
//	debug($userData);
	if (isset($userData)): ?>
	<table>
		<?php foreach ($userData as $user): ?>
			<tr>
<!--			<th>username:</th>-->
			<th><?= "{$user['User']['username']}" ?></th>
			<td><?= "{$user['User']['password']}" ?></td>
			</tr>
		<?php endforeach; ?>

	</table>
<?php endif; ?>
