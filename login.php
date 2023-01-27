<?php session_start(); ?>
<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="login">
        <h1><span>ログイン</span>画面</h1>

        <form action="login.php" method="post">
            <div>
                <label for="login_id">ログインID</label>
                <input type="text" name="login_id" id="login_id">
            </div>
            <div>
                <label for="login_pass">パスワード</label>
                <input type="password" name="login_pass" id="login_pass">
            </div>
            
            <!-- ログイン結果 -->
            <div>
                <?php
                    $loginFlag = false;
                    if (isset($_REQUEST['login_id'], $_REQUEST['login_pass'])) {
                        $loginFlag = true;

                    }

                    if ($loginFlag) {
                        // セッションデータを削除
                        unset($_SESSION['users']);
    
                        // DBとPHPを接続
                        $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
                
                        // SQL文の用意&実行
                        $sql = $pdo->prepare('select * from users where login=? and password=?');
                        $sql->execute([$_REQUEST['login_id'], $_REQUEST['login_pass']]);
    
                        // DBから登録情報取得
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
                            header('Location:home.php');
                            exit();
    
                        } else {
                            echo '※ログインIDまたはパスワードが違います。';
                        }
    
                    }

                ?>   

            </div>

            <button>ログイン</button>

        </form>
        
        <div>
            <p><a href="new_reg_input.php">新規登録の方はこちら</a></p>
        </div>

    </div>

</div>

<?php require 'h&f/footer.php'; ?>