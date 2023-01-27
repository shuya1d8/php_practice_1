<?php require 'h&f/header.php'; ?>

<div id="wrapper">
    <div id="newReg">
        <div id="newRegIn">
            <h1><span>新規登録</span>画面</h1>
            <form action="new_reg_check.php" method="post">
                <table>
                    <tr>
                        <th><label for="name">ユ ー ザ ー 名</label></th>
                        <td><input type="text" name="name" id="name" autocomplete="on" placeholder="例）ろごろご" required></td>
                    </tr>
                    <tr>
                        <th><label for="email">メールアドレス</label></th>
                        <td><input type="email" name="email" id="email" autocomplete="on" placeholder="例）Logologo00@xxx.com" required></td>
                    </tr>
                    <tr>
                        <th>
                            <label for="login_id">ロ&nbsp;グ&nbsp;イ&nbsp;ン&nbsp;ID</label>
                            <br>
                            <small>※半角英数字のみ使用可能</small>
                        </th>
                        <td><input type="text" name="login_id" id="login_id" autocomplete="on" required></td>
                    </tr>
                    <tr>
                        <th>
                            <label for="login_pass">パ ス ワ ー ド</label>
                            <br>
                            <small>※半角英数字、<br>大文字小文字数字を<br>各1文字以上</small>
                        </th>
                        <td><input type="password" name="login_pass" id="login_pass" required></td>
                    </tr>
                </table>
                <small><a href="login.php">🔙ログイン画面に戻る</a></small>
                <button>確認画面へ</button>
            </form>

        </div>

    </div>

</div>

<?php require 'h&f/footer.php'; ?>