<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
/** @var $this View */
/** @var $ip  */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version());
?>
<!DOCTYPE html>
<html>
<head>
<!--	<meta name="viewport" content="width=device-width,initial-scale=1.0">-->
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php
		echo 'SOT3ｸﾛｰｾﾞｯﾄ';
		?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('tasks');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
//		echo $this->Html->script('jquery-3.5.1.min.js');
	?>
		<!--画面幅を一致させる-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!--	スマホ用アイコン	-->
		<link rel="apple-touch-icon" sizes="180x180" href="sot_icon.png">

<!--<script>-->
<!--$(function() {-->
<!--	$('a.delete').click(function (e) {-->
<!--		// ポップアップメッセージを出す-->
<!--		if (confirm('本当に削除してもよろしいですか？')) {-->
<!--			$.post('/blog/posts/delete/' + $(this).data('post-id'), {}, function (res) {-->
<!--				$('#post_' + res.id).fadeOut();-->
<!--			}, "json");-->
<!--		}-->
<!--		return false;-->
<!--	});-->
<!--});-->
<!--</script>-->

</head>
<body>
	<footer id="container">
		<div id="header">
			<h1>
			<?php
			if (isset($ip) && ($ip==='::1' || $ip==='127.0.0.1')) {
				$local = true;
			} else {
				$local = false;
			}
			$local_mes = ($local)? '【ローカル（開発）】': '';
//			$username = $this->Auth->data;
			echo $this->Html->link($local_mes . 'しおメモ',
				array('controller'=>'tasks', 'action'=>'index'), array('class' =>'daimei'));
//			if($local){
//				echo $this->Html->link(__('Kabu '), array('controller'=>'kabus', 'action'=>'index'), array('class'=>'menu_button'));
//			}
			?>
			</h1>
		</div>
		<div id="content">
			<?php echo $this->Flash->render(); ?>
<!-- フラッシュメッセージを削除するスクリプト -->

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
<!--			--><?php //echo $this->Html->link(
//				$cakeDescription,'https://cakephp.org', array('target' => '_blank', 'escape' => true, 'class'=>'pc'
//			)); ?>
			<?php echo "($cakeVersion)"; ?>
		</div>
	</div>
<!-- SQLダンプ表示	-->
<!--	--><?php //echo $this->element('sql_dump'); ?>
	</footer>
<script>
	$(function() {
		setTimeout(function() {
			$('#flashMessage').fadeOut("slow");
		}, 2000); //  0.8秒間かけて、じわっと消す
});

</script>
</body>
</html>

