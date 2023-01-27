<?php session_start(); ?>
<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="regDelCh">
        <?php
            if (isset($_SESSION['users'])) {
              
                // 登録内容削除
                $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
                // profileテーブルから削除
                $sql = $pdo->prepare('delete from profile where users_id=?');
                $sql->execute([$_SESSION['users']['id']]);
                // usersテーブルから削除
                $sql = $pdo->prepare('delete from users where id=?');
                $sql->execute([$_SESSION['users']['id']]);
            
                // セッションデータ削除
                // unset($_SESSION['users']);
            
                echo '<h1>登録を解除しました。</h1>';
                echo '<p>ご利用ありがとうございました。</p>';
                echo '<a href="login.php">ログイン画面へ</a>';

            } else {
                echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
                echo '<p><a href="login.php">ログイン画面へ</a></p>';

            }
            
            ?>


    </div>
    
</div>

<?php require 'h&f/footer.php'; ?>