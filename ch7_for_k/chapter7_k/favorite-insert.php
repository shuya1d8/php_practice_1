<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php

if (isset($_SESSION['users'])) {
	// 	重複確認
	$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
	$sql = $pdo->prepare('select * from favorite where users_id=? and product_id=?');
	$sql->execute([$_SESSION['users']['id'], $_REQUEST['id']]);

	if (empty($sql->fetchAll())) {
		$sql = $pdo->prepare('insert into favorite values(?,?)');
		$sql->execute([$_SESSION['users']['id'], $_REQUEST['id']]);

		echo 'お気に入りに商品を追加しました。';
		echo '<hr>';
		
		require 'favorite.php';
	
	} else {
		echo '既にお気に入りに追加されています。';

	}

} else {
	echo 'お気に入りに商品を追加するには、ログインしてください。';

}

?>

<?php require '../footer.php'; ?>
