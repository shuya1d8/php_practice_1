<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="newReg">
        <div id="newRegCh">
            <h1><span>新規登録</span>確認画面</h1>

            <?php
                // 入力値の英数字,スペースの前半角変換
                $name = mb_convert_kana($_REQUEST['name'], 'a, s');
                $email = mb_convert_kana($_REQUEST['email'], 'a');

                // 入力値の無害化
                $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');

                // 入力値が適切か判定
                $loginId = $_REQUEST['login_id'];
                $loginPass = $_REQUEST['login_pass'];
                $email = $_REQUEST['email'];

                if(preg_match('/^[a-zA-Z0-9]+$/', $loginId) && 
                preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]+$/', $loginPass) && 
                filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
    
                    // ログインIDの重複確認
                    // 重複検索
                    if (isset($_SESSION['users'])) {
                        $id = $_SESSION['users']['id'];
                        $sql = $pdo->prepare('select * from users where id!=? and login=?');
                        $sql->execute([$id, $_REQUEST['login_id']]);
    
                    } else {
                        $sql=$pdo->prepare('select * from users where login=?');
                        $sql->execute([$_REQUEST['login_id']]);
    
                    }
    
                    // 重複検索結果の取得
                    if (empty($sql->fetchAll())) {
                        echo '<form action="new_reg_output.php" method="post">';
                            echo '<table>';
                                echo '<form action="new_reg_output.php" method="post">';
                                echo '<input type="hidden" name="name" value="', $name, '">';
                                echo '<input type="hidden" name="email" value="', $_REQUEST['email'], '">';
                                echo '<input type="hidden" name="login_id" value="', $_REQUEST['login_id'], '">';
                                echo '<input type="hidden" name="login_pass" value="', $_REQUEST['login_pass'], '">';
                                echo '</form>';
                                echo '<tr>';
                                echo '<th>ユーザー名：</th>';
                                echo '<td>', $name, '</td>' ;  
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th><small>メールアドレス</small>：</th>';
                                echo '<td>', $_REQUEST['email'], '</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th>ログインID：</th>';
                                echo '<td>', $_REQUEST['login_id'], '</td>';
                                echo '</tr>';
                                echo '<tr>';
                                echo '<th>パスワード：</th>';
                                echo '<td>', $_REQUEST['login_pass'], '</td>';
                                echo '</tr>';
                            echo '</table>';
                            echo '<div class="agree"><input type="checkbox" name="agree" id="agree">';
                            echo '<label for="agree">登録を確定しますか？</label></div>';
                            echo '<small><a href="new_reg_input.php">🔙 登録画面に戻る</a></small>';
                            echo '<button>登録する</button>';
                        echo '</form>';
                     
                    } else {
                        echo '<div class="error">';
                        echo '※このログインIDはすでに使用されています。<br>';
                        echo '<a href="new_reg_input.php">🔙 登録画面に戻る</a>';
                        echo '</div>';
    
                    }
                  
                } else {
                    echo '<div class="error">';
                    echo '※ログインIDまたはパスワード<br>が正しくありません。<br>';
                    echo '<a href="new_reg_input.php">🔙 登録画面に戻る</a>';
                    echo '</div>';

                }

            ?>

        </div>

    </div>

</div>

<?php require 'h&f/footer.php'; ?>