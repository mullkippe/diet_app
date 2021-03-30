<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';


//ログインチェック関数の作成
//ログインしているかを判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();
if(!$result){
    //戻すだけでは分かりにくいのでメッセージを入れる,メッセージを入れるにはセッションに入れる
    $_SESSION['login_err'] = 'ユーザーを登録してログインしてください';
    header('Location: signup_form.php');
    return;
}
$login_user = $_SESSION['login_user'];
//ログインしているユーザーをセッションから取ってきて、login_userの変数に入れる



?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>マイページ</title>
</head>

<body>
    <h2>マイページ</h2>
    <p>ようこそ、<?php echo h($login_user['name']) ?>さん</p>
    <p>メールアドレス:<?php echo h($login_user['email']) ?></p>
    <p>「temadiet」では、ダイエットにおいて同じ目標を持った仲間とチームを組み、一日のダイエットメニューと目標を記録していきます。</p>
    <p>早速、参加するチームと目標を決めましよう！</p>


    <button type="button" onclick="location.href='team_register.php'">チーム作成！</button>
    <button type="button" onclick="location.href='home.php'">homeへ</button>

    <p><a href="post.html">投稿する</a></p>

<form action="logout.php" method="POST">
    <input type="submit" name="logout" value="ログアウト">
</form>
    <!--    ①ログアウト画面の作成-->
    <!--②ログアウトメソッドの作成-->
    　



</body>
</html>
