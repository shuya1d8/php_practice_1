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
            <div id="profCh">
                <?php
                    if (isset($_SESSION['users'])) {

                        echo '<div id="profImg">';
                            // 画像ファイルある？
                            if (isset($_FILES['prof_img']['tmp_name'])) {

                                // アップロードされたファイルか確認
                                if (is_uploaded_file($_FILES['prof_img']['tmp_name'])) {

                                    // ファイルの保存先フォルダの作成
                                    if (!file_exists('prof_img')) {
                                        mkdir('prof_img');
                                    }
                                    
                                    // アップロードファイルのパス
                                    $prof_img = 'prof_img/'.basename($_FILES['prof_img']['name']);
                                    
                                    // 一時ファイルから保存
                                    if (move_uploaded_file($_FILES['prof_img']['tmp_name'], $prof_img)) {
                                        echo '<img src="', $prof_img, '" alt="プロフィール画像">';
                                        
                                    } else {
                                        echo '<p>アップロードに失敗しました。</p>';
                                        
                                    }

                                    // $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
                                    // $sql = $pdo->prepare('INSERT INTO profile values(null, ?, ?, ?)');
                                    // $sql->execute([$_SESSION['users']['id'], $prof_img, null]);
                                
                                } else {
                                    echo '<p>ファイルを選択してください。<p/>';
                                    
                                }
                            
                            } else {
                                echo '<p>プロフィール画像未選択</p>';

                            }

                        echo '</div>';
                        echo '<div id="profImgIn">';
                            // プロフィール画像のアップロード
                            echo '<form action="profile_change.php" method="post" enctype="multipart/form-data">';
                                echo '<p><input type="file" name="prof_img"></p>';
                                echo '<p><button>アップロード</button></p>';
                            echo '</form>';

                        echo '</div>';
                        echo '<div id="profInfo">';
                            echo '<form action="profile_output.php" method="post">';
                            echo '<p>ユーザー名</p>';
                            echo '<input type="text" name="name" value="', $_SESSION['users']['name'], '">';
                            echo '<p>メールアドレス</p>';
                            echo '<input type="email" name="email" value="', $_SESSION['users']['email'], '">';
                            echo '<p>ログインID <small>※半角英数字のみ使用可能</small></p>';
                            echo '<input type="text" name="login_id" value="', $_SESSION['users']['login_id'], '">';
                            echo '<p>パスワード <small>※半角英数字、大文字小文字数字を各1文字以上</small></p>';
                            echo '<input type="text" name="login_pass" value="', $_SESSION['users']['login_pass'], '">';
                            echo '<p class="p_p">';
                            echo '<a href="profile.php">プロフィール一覧へ戻る</a>';
                            echo '<button>更新</button>';
                            echo '<a href="reg_delete.php">登録を解除する</a>';
                            echo '</p>';
                            echo '</form>';

                        echo '</div>';

                    } else {
                        echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
                        echo '<p><a href="login.php">ログイン画面へ</a></p>';
                        
                    }
                                
                ?>              

            </div>

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