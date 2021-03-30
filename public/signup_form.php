<?php
session_start();
require_once '../functions.php';
require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result){
    header('Location: mypage.php');
    return;
}


$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録画面</title>
    <link rel="stylesheet" href="../css/signup_form.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <header>
            <!--サイト名は大見出しを設定する-->
            <h1>Team Diet</h1>
        </header>

        <div class="sign_up">
            <h2>ユーザー登録フォーム</h2>
            <?php if (isset($login_err)) : ?>
                <p><?php echo $login_err; ?></p>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <p><label for="username">ユーザー名:</label>
                    <input type="text" name="username">
                </p>
                <p><label for="email">メールアドレス:</label>
                    <input type="email" name="email">
                </p>
                <p><label for="password">パスワード:</label>
                    <input type="password" name="password">
                </p>
                <p><label for="password_conf">パスワード確認:</label>
                    <input type="password" name="password_conf">
                </p>
                <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
                <p>
                    <input type="submit" value="新規登録" class="button">
                </p>
            </form>
            <a href="login_form.php">ログインする</a>
        </div>
    </div>

    <footer>
        <p class="pagetop"><a href="#wrapper"><img src="img/gotop.svg" alt="ページトップヘ" width="32"></a></p>
        <p class="copyright"><small>©︎2021 G's ACADEMY TOKYO . All Rights Reserved.</small></p>
    </footer>

</body>
</html>
