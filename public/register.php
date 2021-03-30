<?php
session_start();
require_once '../classes/UserLogic.php';

//バリデーションに引っかかったらエラーという配列に入れてあげる
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
//トークンがない場合、もしくは一致しない場合、処理を中止

if(!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']){
    exit('不正なリクエストです。');
}
unset ($_SESSION['csrf_token']);
//二重送信の対策


//バリデーションを実装するときはフィルターインプットを指定してあげる
if(!$username = filter_input(INPUT_POST, 'username')){
    $err[] = 'ユーザー名を記入してください。';
}
if(!$email = filter_input(INPUT_POST, 'email')){
    $err[] = 'メールアドレスを記入してください。';
}
$password = filter_input(INPUT_POST, 'password');
//正規表現を使う（パスワードとマッチするか）8文字以上100文字以下
if (!preg_match("/\A[a-z\d]{8,100}+\z/i",$password)){
    $err[] = 'パスワードは英数字8文字以上100文字以下にしてください。';

}
$password_conf = filter_input(INPUT_POST, 'password_conf');
//パスワードの値とパスワードコンフの値が間違っていたらエラーにしてあげる
if ($password !== $password_conf){
    $err[] = '確認用パスワードと異なっています。';
}

//もしエラーがなかった場合=0
if (count($err) === 0){
    //ユーザーを登録する処理
    $hasCreated = UserLogic :: createUser($_POST);
    //ユーザーロジックというクラスのクリエイトユーザーというメソッドでユーザーを登録する処理をつくる
    if(!$hasCreated){
        $err[] = '登録に失敗しました';
    }


}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザー登録完了画面</title>
</head>

<body>
    <?php if(count($err) > 0) : ?>
    <?php foreach($err as $e) : ?>
    <p><?php echo $e ?></p>
    <?php endforeach ?>

    <?php else : ?>
    <p>ユーザー登録が完了しました</p>
    <?php endif ?>
    <a href="./signup_form.php">戻る</a>

</body>
</html>
