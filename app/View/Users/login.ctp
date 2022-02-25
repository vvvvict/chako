<?php
/* app/View/Users/login.ctp */
/** @var /app/View/UsersView $this */
/** @property User $users */
/** @var User $users */
/** @var $this View */
/** @var array */
?>
<!--<h1>サンプル2</h1>-->
<!--<h2>ログイン</h2>-->

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<div class="login">
	<?php echo $this->Form->end('　ログイン　'
//		,array(
//			'label' => 'UserUsername',
//			'name' => 'data[User][username]',
//			'div' => array('class' => 'input text required'))
	); ?>
	<?php echo $this->Html->link('新規登録はこちら', '/users/add',
		array('controller'=>'users', 'action' =>'add', 'class'=>'add_action etc_button')); ?>
</div>

<!--add_action etc_button-->
