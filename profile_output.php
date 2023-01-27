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
        <!-- <div id="profMain"> -->
            <div id="profOut">
                <?php
                    // 入力値の英数字,スペースの前半角変換
                    $name = mb_convert_kana($_REQUEST['name'], 'a, s');
                    $email = mb_convert_kana($_REQUEST['email'], 'a');

                    // 入力値の無効化
                    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
                    
                    // 入力値が適切か判定
                    $loginId = $_REQUEST['login_id'];
                    $loginPass = $_REQUEST['login_pass'];
                    $email = $_REQUEST['email'];

                    if(preg_match('/^[a-zA-Z0-9]+$/', $loginId) && 
                    preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/', $loginPass) && 
                    filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
                    
                        if (isset($_SESSION['users'])) {
                            
                            // id取得
                            $id = $_SESSION['users']['id'];

                            // 登録情報の更新作業
                            $sql = $pdo->prepare('update users set name=?, email=?, login=?, password=? where id=?');
                            $sql->execute([$_REQUEST['name'], $_REQUEST['email'], $_REQUEST['login_id'], $_REQUEST['login_pass'], $id]);

                            // セッションデータの更新
                            $_SESSION['users'] = [
                                'id'=>$id, 'name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email'], 
                                'login_id'=>$_REQUEST['login_id'], 'login_pass'=>$_REQUEST['login_pass']
                            ];

                            echo '<p>更新しました。</p><br>';
                            echo '<p><a href="profile_change.php">続けて更新する</a></p>';
                            echo '<p><a href="profile.php">プロフィール一覧へ</a></p>';

                        } else {
                            echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
                            echo '<p><a href="login.php">ログイン画面へ</a></p>';

                        }

                    }

                ?>

            </div>

        <!-- </div> -->

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