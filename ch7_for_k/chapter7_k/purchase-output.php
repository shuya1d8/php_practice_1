<?php session_start(); ?>
<?php require '../header.php'; ?>
<?php require 'menu.php'; ?>

<?php
$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');

$purchase_id = 1;

foreach ($pdo->query('select max(id) from purchase') as $row) {
	$purchase_id = $row['max(id)'] + 1;

}

$sql = $pdo->prepare('insert into purchase values(?,?)');

if ($sql->execute([$purchase_id, $_SESSION['users']['id']])) {
	foreach ($_SESSION['product'] as $product_id=>$product) {
		$sql = $pdo->prepare('insert into purchase_detail values(?,?,?)');
		$sql->execute([$purchase_id, $product_id, $product['count']]);

	}

	unset($_SESSION['product']);

	echo '購入手続きが完了しました。ありがとうございます。';

} else {
	echo '購入手続き中にエラーが発生しました。申し訳ございません。';

}

?>

<?php require '../footer.php'; ?>
