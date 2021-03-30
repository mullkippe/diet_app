<?php
session_start();
require_once '../classes/UserLogic.php';

$result = UserLogic::checkLogin();
if($result){
    header('Location: mypage.php');
    return;
}


$err = $_SESSION;

//セッションを消す
$_SESSION = array();
session_destroy();


?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../css/signup_form.css" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400&display=swap" rel="stylesheet">

</head>

<body>
    <div id="wrapper">
        <header>
            <h1>Team Diet</h1>
        </header>

            <div class="sign_up">
                <h2>ログインフォーム</h2>
                <?php if (isset($err['msg'])) : ?>
                             <?php echo $err ['msg']; ?>
                    <?php endif; ?>
                <form action="login.php" method="POST">

                    <p>
                        <label for="email">メールアドレス:</label>
                        <input type="email" name="email">
                        <?php if (isset($err['email'])) : ?>
                             <?php echo $err ['email']; ?>
                    <?php endif; ?>

                    </p>

                    <p>
                        <label for="password">パスワード:</label>
                        <input type="password" name="password">
                        <?php if (isset($err['password'])) : ?>
                             <?php echo $err ['password']; ?>
                    <?php endif; ?>
                    </p>

                    <p>
                        <input type="submit" value="ログイン" class="button">
                    </p>
                </form>
                <a href="signup_form.php">新規登録はこちら</a>
            </div>

    </div>

    <footer>
        <p class="pagetop"><a href="#wrapper"><img src="img/gotop.svg" alt="ページトップヘ" width="32"></a></p>
        <p class="copyright"><small>©︎2021 G's ACADEMY TOKYO . All Rights Reserved.</small></p>
    </footer>

</body>
</html>
