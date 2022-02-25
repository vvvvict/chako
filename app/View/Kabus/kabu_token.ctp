<?php
/** @var /app/View/kabu_tokenView $this */
/** @property Kabu $kabus */
/** @var Kabu $kabu */
/** @var $this View */
/** @var kabu $mt_mode */
?>
<div class>
	<h4><?echo $mt_mode==='main' ? '★本番モード' :'検証モード'; ?></h4>
	<?php echo $this->Form->create(); ?>
	<?php	echo $this->Form->input('pass_ent', array('label'=>'暗証入力（半角英数）', 'type'=>'tel',));?>
	<?php echo $this->Form->end(__('Submit'));	?>
</div>
