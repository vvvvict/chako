<?php
/** @var /app/View/kabuView $this */
/** @property Kabu $kabus */
/** @var Kabu $kabu */
/** @var $this View */
/** @var kabu $mt_mode */
?>
<div class>
		<?
		if (!isset($mt_mode) || $mt_mode==='none'):
			echo '<h2>未ログイン</h2>';
			echo $this->Html->link('本番ログイン', array('action'=>'kabu_token', 'main'));
			echo $this->Html->link('検証ログイン', array('action'=>'kabu_token', 'test')); ?>
		<? else: ?>
			<?= '<h2>'. ($mt_mode==='main' ? '本番モード' : '検証モード') . '</h2>'; ?>

				<?php echo $this->Form->create(); ?>
				<?php	echo $this->Form->input('symbol', array('label'=>'参照　銘柄番号', 'type'=>'tel',));?>
				<?php echo $this->Form->end(__('Submit'));	?>

		<? endif; ?>
</div>
