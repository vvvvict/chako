<?php
/** @var /app/View/TasksView $this */
/** @property Task $tasks */
/** @var Task $tasks */
/** @var $this View */
/** @var array */
?>
<div>
	<div class="page">
		<?php echo $this->Html->link('追加', 'add', array('data-transition' =>'fade', 'class' =>'add_action')); ?>
		<?php echo $this->Html->link('ログアウト', '/users/logout',
			array('controller'=>'users', 'action' =>'logout', 'class'=>'add_action login_out')); ?>
		<?php
		echo $this->Paginator->first(__('トップ'), array());
		echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('first' => 4, 'separator' => ''));
		echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last(__('ラスト') , array());
		?>
		<?php $date_mode = (false)? 'created': 'modified'; ?>
		<?php $date_title = ($date_mode==='created')? '作成日順': '更新日順'; ?>
		<?php
			$count = count($tasks);
			$start_id = $tasks[0]['Task']['id'];
			$end_id = $tasks[$count-1]['Task']['id'];
		?>
	</div>
	<table>
	<thead>
	<tr>
			<th><?php
				$junjo = ($start_id > $end_id) ? '新着' : '古い';
				echo $this->Paginator->sort('id', "ID順 ({$start_id}から{$end_id}){$count}件 現在{$junjo}順"); ?></th>
			<th><?php echo $this->Paginator->sort($date_mode, $date_title); ?></th>
	</tr>
	</thead>
	</table>

	<?php
	$week = ['日','月','火','水','木','金','土',];
	foreach ($tasks as $task):
		$date = $task['Task'][$date_mode];
		$year = substr($date, 0, 4 );
		$year = ($year===date('Y')) ? '': $year.'/';
		$month = (int)substr($date, 5, 2 );
		$day = (int)substr($date, 8, 2 );
		$dayow = "({$week[date('w', strtotime($date))]})";
		$dt = (string)$month . '/' . (string)$day;
//		$dt = str_replace('-','/', substr($task['Task'][$date_mode], 5, 5 ));
		$time_disp = 'on';
		$hour = (int)substr($date, 11, 2);
		$minute = (int)substr($date, 14, 2);
		$time = "{$hour}:{$minute}";
//		$time = substr($date, 11, 5);
		$time = ($time_disp==='on') ? $time: '';
		?>
	<dl class="sumaho">
		<dt>
			<?php echo h($year.$dt.$dayow.$time); //時刻あり ?>
			<?php echo $this->Html->link($task['Task']['name'], array('action' => 'view', $task['Task']['id'])); ?>
		</dt>
		<dd>
			<span class="body"><?php echo h($task['Task']['body']); ?></span>
		</dd>
	</dl>
<?php endforeach; ?>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?></p>
</div>
