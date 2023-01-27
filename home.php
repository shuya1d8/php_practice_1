<?php session_start(); ?>
<?php require 'h&f/header1.php'; ?>
    <nav id="globalNavi">
        <ul>
            <li class="current"><a href="home.php">HOME</a></li>
            <li><a href="note.php">なにか</a></li>
            <li><a href="idk.php">どれか</a></li>
            <li><a href="contact.php">お問い合わせ</a></li>
        </ul>
    </nav>

</header>

<div id="wrapper">
    <?php if(isset($_SESSION['users'])) { ?>
    <div id="home">
        <h1>HOME</h1>
        <aside id="sidebar">
            <section id="news">
                <h3>お知らせ</h3>
                <small>
                    <dl>
                        <dt>2022/07/29</dt>
                        <dd>HOMEのプロフィール欄および登録解除画面を更新しました。</dd>
                        <dt>20XX/XX/XX</dt>
                        <dd>HOMEを更新しました。</dd>
                        <dt>20XX/XX/XX</dt>
                        <dd><strike>？ろごろご？</strike>を開設しました。</dd>
                        <dt><a href="secret.php" target="_blank" style="color: #fff; text-decoration: none;">隠しリンク</a></dt>
                    </dl>
                </small>
            </section>
            <section id="relation">
                <h3>関連リンク</h3>
                <ul>
                    <li><a href="#">なにか</a></li>
                    <li><a href="#">なにか</a></li>
                    <li><a href="#">なにか</a></li>
                </ul>
            </section>

        </aside>
        <div id="homeMain">
            <h2>メイン</h2>
            <p>おそらくこのサイトの概要</p>
            <p>おそらくこのサイトの概要</p>
            <p>おそらくこのサイトの概要</p>
            <h3>サブ</h3>
            <p>なにか</p>
            <p>なにか</p>
            <p>なにか</p>

        </div>
        <div id="sideProf">
            <h2>プロフィール</h2>
            <?php
                // $pdo = new PDO('mysql:host=localhost;dbname=kouka2249580;charset=utf8', 'root', '');
                // $sql = $pdo->prepare('SELECT * FROM users,profile WHERE users_id=?');
                // $sql->execute([$_SESSION['users']['id']]);
                
                // $name = $prof_img = $prof_com = '';
                // foreach ($sql as $row) {
                //     $name = $row['name'];
                //     $prof_img = $row['prof_img'];
                //     $prof_com = $row['prof_comment'];

                // }
                // echo '<div id="sideProfImg">';
                // echo '<img src="', $prof_img, '" alt="プロフィール画像">';
                // echo '</div>';

                // echo '<p>ユーザー名</p>';
                // echo $name;
                
                // echo '<p>コメント</p>';
                // echo $prof_com;

            ?>
            <div id="sideProfImg">
                <img src="', $prof_img, '" alt="プロフィール画像">
            </div>
            <p>ユーザー名</p>
            <p>コメント</p>
            <a href="profile.php">プロフィール一覧へ</a>

        </div>

    </div>
    <?php
    } else {
        echo '<div id="homeOut">';
        echo '<p>有効期限が過ぎました。再度ログインしてください。</p>';
        echo '<p><a href="login.php">ログイン画面へ</a></p>';
        echo '</div>';

    }

    ?>
    
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