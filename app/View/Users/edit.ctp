<?php
/** @var /app/View/UsersView $this */
/** @property User $users */
/** @var User $users */
/** @var $this View */
/** @var array */
?>
<!--<h1>サンプル2</h1>-->
<!--<h2>ユーザ管理</h2>-->
<h2>ユーザ<?php echo empty($this->data['User']['id']) ? '追加' : '編集'; ?></h2>

<?php echo $this->Form->create('User'); ?>
<?php echo empty($this->data['User']['id']) ? null : $this->Form->input('id', array('type'=>'hidden')); ?>

<div class="input">
	<p>ID:<?php echo empty($this->data['User']['id']) ? '(新規)' : h($this->data['User']['id']); ?></p>
	<br>
</div>

<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end(array(
	'value'=>empty($this->data['User']['id']) ? ' 追加 ' : ' 編集 ',
	'class'=>'etc_button'
	)); ?>
