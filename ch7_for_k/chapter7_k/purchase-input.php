<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
if (!isset($_SESSION['users'])) {
	echo '購入手続きを行うにはログインしてください。';

} elseif (empty($_SESSION['product'])) {
	echo 'カートに商品がありません。';

} else {
	echo '<p>お名前：', $_SESSION['users']['name'], '</p>';
	echo '<p>メールアドレス：', $_SESSION['users']['email'], '</p>';
	echo '<hr>';

	require 'cart.php';

	echo '<hr>';
	echo '<p>内容をご確認いただき、購入を確定してください。</p>';
	echo '<a href="purchase-output.php">購入を確定する</a>';

}

?>

<?php require '../footer.php'; ?>
