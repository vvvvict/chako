<?php
/** @var /app/View/TasksView $this */
/** @property Task $tasks */
/** @var Task $tasks */
/** @var $this View */

?>
<!--<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>-->
<!--<script src="ファイルのパス/jquery-3.5.1.min.js"></script>-->
<!--<script>-->
<!--$('h1').text('hello world');-->
<!---->
<!--// jQuery バージョン 3.5.1の場合-->
<!--	$(document).ready(function()-->
<!--{-->
<!--// 一定時間経過後、メッセージを閉じる-->
<!--setTimeout(function() {-->
<!--$('#flashMessage').fadeOut("slow");-->
<!--}, 150);-->
<!--});-->
<!---->
<!--// ボタンをクリックしたら発動-->
<!--$('button').click(function() {-->
<!--	// 素早くフェードアウトさせる-->
<!--	$('div').fadeOut('fast');-->
<!--	});-->
<!--});-->
<!--</script>-->

<div class="tasks">
<?php echo $this->Form->create(); ?>
	<fieldset>
		<legend><?php echo 'タスク＆覚え';?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('body');
		echo $this->Form->input('ip', array('type'=>'hidden', 'value' => $ip));
		echo $this->Form->end(array('type' => 'button', 'onclick' => "submit();", 'value' => __('submit'),));
		echo $this->Form->input('status');
		echo $this->Form->input('due_date');
	?>
	</fieldset>
<?php echo $this->Form->end(array('type' => 'button', 'onclick' => "submit();", 'value' => __('submit'),));?>
</div>
