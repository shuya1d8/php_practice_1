<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
if (isset($_SESSION['users'])) {
	$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');

	$sql_purchase = $pdo->prepare('select * from purchase where users_id=? order by id desc');
	$sql_purchase->execute([$_SESSION['users']['id']]);

	foreach ($sql_purchase as $row_purchase) {
		$sql_detail = $pdo->prepare('select * from purchase_detail,product where purchase_id=? and product_id=id');
		$sql_detail->execute([$row_purchase['id']]);

		echo '<table>';
		echo '<tr><th>商品番号</th><th>商品名</th>', '<th>価格</th><th>個数</th><th>小計</th></tr>';

		$total=0;
		
		foreach ($sql_detail as $row_detail) {
			echo '<tr>';
			echo '<td>', $row_detail['id'], '</td>';
			echo '<td><a href="detail.php?id=', $row_detail['id'], '">', $row_detail['name'], '</a></td>';
			echo '<td>', $row_detail['price'], '</td>';
			echo '<td>', $row_detail['count'], '</td>';

			$subtotal = $row_detail['price'] * $row_detail['count'];
			$total += $subtotal;

			echo '<td>', $subtotal, '</td>';
			echo '</tr>';

		}

		echo '<tr><td>合計</td><td></td><td></td><td></td><td>', $total, '</td></tr>';
		echo '</table>';
		echo '<hr>';

	}

} else {
	echo '購入履歴を表示するには、ログインしてください。';

}

?>

<?php require '../footer.php'; ?>
