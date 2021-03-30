<?php

$blogs = $_POST;

if(empty($blogs['title'])){
    exit('タイトルを入力してください');
}
if(mb_strlen($blogs['title']) > 191){
    exit('タイトルは191文字以下にしてください');
}
if(empty($blogs['weight'])){
    exit('体重を入力してください');
}
if(empty($blogs['mokuhyou'])){
    exit('目標を入力してください');
}

//データベースに入れる

$sql = 'INSERT into post_table(title,weight,mokuhyou) VALUES(:title, :weight, :mokuhyou)';

function dbConnect(){
    $dsn = 'mysql:host=localhost;dbname=user;charest=utf8';
    $user = 'ayumi';
    $pass = '9907Ayumi';
try {
    $dbh = new PDO($dsn,$user,$pass,[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false,

]);

}catch(PDOException $e){
    echo '接続が失敗です'. $e->getMessage();
    exit();
};
return $dbh;

}

$dbh = dbConnect();

try{
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
    $stmt->bindValue(':weight',$blogs['weight'],PDO::PARAM_INT);
    $stmt->bindValue(':mokuhyou',$blogs['mokuhyou'],PDO::PARAM_STR);
    $stmt->execute();


}catch(PDOException $e){
    exit($e);
}



?>
