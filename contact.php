<?php session_start(); ?>
<?php require 'h&f/header1.php'; ?>
    <nav id="globalNavi">
        <ul>
            <li><a href="home.php">HOME</a></li>
            <li><a href="note.php">なにか</a></li>
            <li><a href="idk.php">どれか</a></li>
            <li class="current"><a href="contact.php">お問い合わせ</a></li>
        </ul>
    </nav>

</header>

<div id="wrapper">
    <div id="contact">
        <?php if (isset($_SESSION['users'])) { ?>
        <h1>お問い合わせ</h1>
        <form action="contact_output.php" method="post" onsubmit="return check()">
            <?php
            echo '<input type="hidden" name="id" value="', $_SESSION['users']['id'], '">';
            ?>
            <table>
                <tr>
                    <th>ユーザー名</th>
                    <?php
                    echo '<td>', $_SESSION['users']['name'], '</td>';
                    ?>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <?php
                    echo '<td>', $_SESSION['users']['email'], '</td>';
                    ?>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td>
                        <input type="radio" name="class" value="1" required> 不具合&emsp;
                        <input type="radio" name="class" value="2" required> ご意見&emsp;
                        <input type="radio" name="class" value="3" required> その他&emsp;
                    </td>
                </tr>
                <tr>
                    <th>詳細内容</th>
                    <td><textarea name="contents" cols="50" rows="10" required style="font-size: 15px;"></textarea></td>
                </tr>
            </table>
            <button id="btn">送信</button>
        </form>

        <?php
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

<script>
    function check() {
        if (confirm('送信しますか？')) {
            return true;

        } else {
            return false;

        }

    }

</script>