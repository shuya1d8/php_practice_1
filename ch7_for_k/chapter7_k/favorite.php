<?php
if (isset($_SESSION['users'])) {
	echo '<table>';
	echo '<th>商品番号</th><th>商品名</th><th>価格</th>';

	$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');

	$sql = $pdo->prepare('select * from favorite, product where users_id=? and product_id=id');
	$sql->execute([$_SESSION['users']['id']]);

	foreach ($sql as $row) {
		$id = $row['id'];

		echo '<tr>';
		echo '<td>', $id, '</td>';
		echo '<td><a href="detail.php?id='.$id.'">', $row['name'], '</a></td>';
		echo '<td>', $row['price'], '</td>';
		echo '<td><a href="favorite-delete.php?id=', $id, '">削除</a></td>';
		echo '</tr>';

	}

	echo '</table>';

} else {
	echo 'お気に入りを表示するには、ログインしてください。';

}

?>
