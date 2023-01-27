<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="secret" style="text-align: center;">
        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
        $sql = $pdo->prepare('SELECT * FROM users');
        $sql->execute([]);
        
        foreach ($sql as $row) {
            echo '<p>', $row['name'], '：', $row['email'], '：', $row['login'], '：', $row['password'], '</p>';

        }

        ?>

    </div>
    
</div>

<?php require 'h&f/footer.php'; ?>