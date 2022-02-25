<nav class="view actions">
	<ul>
		<li><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link('追加', array('action' => 'add')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $task['Task']['id']))); ?> </li>
	</ul>
</nav>
<div class="tasks view">
<!--	<h2>--><?php //echo __('Task'); ?><!--</h2>-->
	<div  id="pc" >
	<dl>
		<dt class="pc"><?php echo __('(Id)'); ?></dt>
		<dd class="pc"><?php echo h($task['Task']['id']); ?></dd>
		<dt class="pc"><?php echo __('タイトル'); ?></dt>
		<dd class="pc"><?php echo h($task['Task']['name']); ?></dd>
		<dt class=""><?php echo __('Body'); ?></dt>
		<dd><?php	echo nl2br(h($task['Task']['body'])); ?></dd>
		<dt class=""><?php echo __('Status'); ?></dt>
		<dd><?php echo h($task['Task']['status']); ?></dd>
		<dt class=""><?php echo __('Due Date'); ?></dt>
		<dd><?php echo h($task['Task']['due_date']); ?></dd>

		<dt class=""><?php echo __('IP'); ?></dt>
		<dd><?php echo h($task['Task']['ip']); ?></dd>

		<dt class=""><?php echo __('Created'); ?></dt>
		<dd><?php echo h($task['Task']['created']); ?></dd>
		<dt class=""><?php echo __('Modified'); ?></dt>
		<dd><?php echo h($task['Task']['modified']); ?></dd>
	</dl>
	</div>
	<div  id="hmenu" >
	<dl>
		<dd><?php echo h("({$task['Task']['id']}){$task['Task']['name']}"); ?></dd>
		<dd><?php echo "h"; ?></dd>
		<dd><?php echo __('Body'); ?></dd>
		<dd><?php	echo nl2br(h($task['Task']['body'])); ?></dd>
		<dd><?php echo __('Status'); ?></dd>
		<dd><?php echo h($task['Task']['status']); ?></dd>
		<dd><?php echo __('Due Date'); ?></dd>
		<dd><?php echo h($task['Task']['due_date']); ?></dd>
		<dd><?php echo __('Created'); ?></dd>
		<dd><?php echo h($task['Task']['created']); ?></dd>
		<dd><?php echo __('Modified'); ?></dd>
		<dd><?php echo h($task['Task']['modified']); ?></dd>
	</dl>
	</div>
</div>
