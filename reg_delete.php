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
    <div id="regDel">
        <?php                
            if (isset($_SESSION['users'])) {
                
                echo '<h1><span>登録解除</span>画面</h1>';
                echo '<p>登録を解除しますか？</p>';
                echo '<a href="reg_delete_check.php">解除する</a>';


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