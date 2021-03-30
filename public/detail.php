<?php
$id = $_GET['id'];

if(empty($id)){
    exit('idが不正です');
}

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

//SQL準備
//$stmt = $dbh->prepare('SELECT * FROM post_table Where id=:id');

$stmt = $dbh->prepare('SELECT *FROM post_table INNER JOIN users ON post_table.user_id=users.id');



$stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);


//SQLの実行
$stmt->execute();

//結果を取得
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if(!$result){
    exit('ブログがありません。');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> 投稿詳細 </title>
</head>

<body>
    <h2>投稿詳細</h2>
    <h3>タイトル:<?php echo $result['title'] ?></h3>
    <p>投稿日時:<?php echo $result['post_at'] ?></p>
    <p>体重:<?php echo $result['weight'] ?></p>
    <hr>
    <p>今日の目標:<?php echo $result['mokuhyou'] ?></p>

</body>
</html>
