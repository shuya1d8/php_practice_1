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
    <div id="profile">
        <h1>＜プロフィール＞</h1>
        <div id="profMain">
            <?php
                if (isset($_SESSION['users'])) {

                    echo '<div id="profImg">';
                        echo '<p>NO IMAGE</p>';

                    echo '</div>';
                    echo '<div id="profInfo">';            
                        echo '<p>ユーザー名</p>';
                        echo $_SESSION['users']['name'];
                        echo '<p>メールアドレス</p>';
                        echo $_SESSION['users']['email'];
                        echo '<p>ログインID</p>';
                        echo $_SESSION['users']['login_id'];
                        echo '<p>パスワード</p>';
                        echo '*****';
                        echo '<p><a href="profile_change.php">登録内容を変更する</a></p>';

                    echo '</div>';
                    echo '<div id="logout">';
                        echo '<a href="logout_check.php">ログアウト</a>';

                    echo '</div>';


                } else {
                    echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
                    echo '<p><a href="login.php">ログイン画面へ</a></p>';

                }

            ?>

        </div>

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