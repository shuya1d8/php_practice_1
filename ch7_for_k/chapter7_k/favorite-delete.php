<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
if (isset($_SESSION['users'])) {
	$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');

	$sql = $pdo->prepare('delete from favorite where users_id=? and product_id=?');
	$sql->execute([$_SESSION['users']['id'], $_REQUEST['id']]);
	
	echo 'お気に入りから商品を削除しました。';
	echo '<hr>';

} else {
	echo 'お気に入りから商品を削除するには、ログインしてください。';

}

require 'favorite.php';

?>

<?php require '../footer.php'; ?>
