<?php session_start(); ?>
<?php require 'h&f/header1.php'; ?>
    <nav id="globalNavi">
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="note.php">なにか</a></li>
            <li><a href="idk.php">どれか</a></li>
            <li><a href="contact.php">お問い合わせ</a></li>
        </ul>
    </nav>

</header>

<div id="wrapper">
    <div id="contact">
        <?php
        if (isset($_SESSION['users'])) {
            echo '<p style="padding-top: 50px;">送信しました。</p>';

            // 現在の日付と時刻を取得
            $dateTime = new DateTime('now', new DateTimeZone('JST'));
            $nowDateTime = $dateTime->format('Y/m/d H:i:s');

            // DBに内容登録
            $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
            $sql = $pdo->prepare('INSERT INTO contact VALUES(null, ?, ?, ?, ?)');
            $sql->execute([$_REQUEST['id'], $_REQUEST['class'], $_REQUEST['contents'], $nowDateTime]);

        } else {
            echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
            echo '<p><a href="login.php">ログイン画面へ</a></p>';

        }
        
        ?>
    </div>
    
</div>

<footer>
    <div id="footerNavi">
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="note.php">なにか</a></li>
            <li><a href="idk.php">どれか</a></li>
            <li><a href="contact.php">お問い合わせ</a></li>
        </ul>
</div>
<?php require 'h&f/footer1.php'; ?>