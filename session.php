<?php session_start(); ?>
<?php
$pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
$sql = $pdo->prepare('SELECT * FROM users WHERE id=?');
$sql->execute('');

?>