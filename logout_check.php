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
    <div id="logoutCh">
        <h1><span>ログアウト</span>確認画面</h1>
        <h2>※ログアウトしますか？</h2>
        <p><a href="logout.php">確定する</a></p>
        <p><a href="profile.php">プロフィール一覧に戻る</a></p>

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