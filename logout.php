<?php session_start(); ?>
<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <?php
        // ログイン状況確認
        if (isset($_SESSION['users'])) {

            // セッションデータ削除
            unset($_SESSION['users']);

            // ログイン画面に遷移
            header('Location:login.php');
            exit();

        } else {
            echo '<div id="logOut">';
            echo '※すでにログアウトしています。<br>';
            echo '<a href="login.php">ログイン画面へ</a>';
            echo '</div>';

        }

    ?>
    
</div>

<?php require 'h&f/footer.php'; ?>