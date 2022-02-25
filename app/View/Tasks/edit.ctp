<?php
/** @var $this View */
?>
<div class="top_actions">
	<ul>
		<li><h3><?php echo __('Actions'); ?></h3></li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Task.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Task.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?></li>
	</ul>
</div>
<div class="tasks botom_form">
<?php echo $this->Form->create('Task'); ?>
	<fieldset>
		<legend><?php echo 'Taskを' . __('Edit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('body');
		echo $this->Form->input('status');
		echo $this->Form->input('due_date');
	?>
	</fieldset>
<?php echo $this->Form->end(array('type' => 'button', 'onclick' => "submit();", 'value' => __('submit'),));?>
</div>
