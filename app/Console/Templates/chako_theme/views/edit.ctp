<?php
/** @var $this View */
?>
<div class="tasks form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo __('Edit') . 'Task'; ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('body');
		echo $this->Form->input('status');
		echo $this->Form->input('due_date');
	?>
	</fieldset>
	<?php echo $this->Form->end(array('type'=>'button', 'onclick' => "submit();",'value' => __('submit')));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Task.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Task.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index')); ?></li>
	</ul>
</div>
