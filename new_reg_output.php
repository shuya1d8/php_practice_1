<?php session_start(); ?>
<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="newReg">
        <div id="newRegOut">
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');

                // 新規登録確定
                if (isset($_REQUEST['name'], $_REQUEST['email'], $_REQUEST['login_id'], $_REQUEST['login_pass'], $_REQUEST['agree'])) {
                    // 現在の日付と時刻を取得
                    $dateTime = new DateTime('now', new DateTimeZone('JST'));
                    $nowDateTime = $dateTime->format('Y/m/d H:i:s');

                    // DBに追加
                    $sql = $pdo->prepare('insert into users values(null, ?, ?, ?, ?, ?)');
                    $sql->execute([
                        $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['login_id'], 
                        $_REQUEST['login_pass'], $nowDateTime
                    ]);

                    // セッションデータに格納

                    unset($_SESSION['users']);

                    $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
            
                    $sql = $pdo->prepare('select * from users where login=? and password=?');
                    $sql->execute([$_REQUEST['login_id'], $_REQUEST['login_pass']]);

                    foreach ($sql as $row) {
                        $_SESSION['users'] = [
                            'id'=>$row['id'], 'name'=>$row['name'], 'email'=>$row['email'], 
                            'login_id'=>$row['login'], 'login_pass'=>$row['password']
                        ];
                    }

                    // ログイン判定
                    if (isset($_SESSION['users'])) {    
                        // セッション固定攻撃を防ぐためにログイン後にセッションIDの再発行を行うことが効果的
                        session_regenerate_id();

                        // ページ遷移
                        header('Location:profile.php');
                        exit();

                    } else {
                        echo '通信に失敗しました。';
                        echo 'ログイン画面で再度ログインしてください。';
                        echo '<p><a href="login.php">ログイン画面へ</a></p>';
                    }
                    
                } else {
                    echo '<div class="error">';
                    echo '登録できませんでした<br>';
                    echo 'お手数をお掛けしますが再度入力してください';
                    echo '<p>原因例：「登録を確定しますか？」にチェックをいれていない</p>';
                    echo '<a href="new_reg_input.php">🔙 登録画面に戻る</a>';
                    echo '</div>';

                }

            ?>

        </div>

    </div>

</div>

<?php require 'h&f/footer.php'; ?>