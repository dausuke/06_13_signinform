<?php
//データ受信
$name = $_POST['name'];
$age = $_POST['age'];
$city = $_POST['city'];
$email = $_POST['email'];
$password = $_POST['password'];

//メールアドレスとパスワードをサインイン認証のため連想配列に格納
$signup_data = array('email' => $email, 'password' => $password);

//受信したデータをjson形式へエンコード
$json_sigin_data = json_encode($signup_data);
// var_dump($createemail);
// exit();

//ファイル書き込み
$file_a = fopen('data/sign_in.txt', 'a');
flock($file_a, LOCK_EX);
fwrite($file_a, $json_sigin_data . "\r\n");
flock($file_a, LOCK_UN);
fclose($file_a);
header('Location: index.php');
