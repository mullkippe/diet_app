<?php

/**
* XXS対策:エスケープ処理
* @param string $str 対象の文字列
* return string 処理された文字列
*/
function h($str){
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');

}

/**
* CSRF対策(ワンタイムトークン)
* @param void（引数がない）
* return string $csrf_token
*/
function setToken(){
    //トークンを作成
    //フォームからそのトークンを送信
    //送信後の画面でそのトークンを照会
    //一致していたらOK、一致していなかったら不正リクエストとして処理、処理が完了したらトークンを削除


    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    return $csrf_token;

}



?>
