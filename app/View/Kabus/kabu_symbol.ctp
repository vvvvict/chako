<?php
/** @var /app/View/kabu_symbolView $this */
/** @property Kabu $kabus */
/** @var Kabu $kabu */
/** @var $this View */
/** @var kabu $mt_mode */
?>
<div class>
	<h4>
		<?= $mt_mode==='main' ? '本番モード' :'検証モード'; ?></h4>
		<?= $this->Form->create();
//		false, array('url'=>array('controller'=>'Kabus', 'action'=>'kabu'))); ?>
		<?= $this->Form->input('symbol', array('label' => '銘柄番号入力'));?>
		<?= $this->Form->end(__('Submit')); ?>
</div>
