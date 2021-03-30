<?php

require_once 'env.php';

//やりたい機能
//①ユーザー登録フォームの作成
//②登録画面完了の作成
//③バリデーション（データが正しいか判断する）の作成

//後半はここから
//④ユーザー登録ロジックの作成
//⑤ユーザー登録機能の実装

function connect()
{
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


    //エラーをキャッチするためにトライキャッチで囲ってあげる

try {
    $pdo = new PDO($dsn,$user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
     return $pdo;
}catch(PDOExeption $e){
    echo '接続失敗です'. $e->getMessage();
    exit();

}

}



?>
