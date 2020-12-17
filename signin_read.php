<?php

//データ受信
$email = $_POST['email'];
$password = $_POST['pass'];
$signin_data = array('email' => $email, 'password' => $password);

// var_dump($get_data);
// exit();

//テキストファイル読み込み
$file = fopen('data/sign_in.txt', 'r');
flock($file, LOCK_EX);
if ($file) {
    while ($line = fgets($file)) {
        $read_data[] =
            json_decode($line, true);
    }
}

flock($file, LOCK_UN);
fclose($file);

//ログイン認証
//入力されたアドレス、パスワードの配列がテキストファイル内にあれば変数judgeにtrueなければfalseを格納
$result = in_array($signin_data, $read_data);
// var_dump($result);
// exit();
if ($result) {
    $judge = 'true';
} else {
    $judge = 'false';
}
// var_dump($judge);
// exit();
?>

<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/signin.css">
    <title>signinmonereco</title>
</head>

<body>
    <h1>MoneyRecord</h1>
    <div class='loader'>
        <p>Loading...</p>
    </div>
    <main>
        <form action="signin_data.php" method="POST">
            <div class="signin">
                <fieldset class="signin-content">
                    <input type="text" name="email" id='mail' placeholder="email">
                    <input type="password" name="pass" id='password' placeholder="password">
                    <button id="signupbtn">sign-in</button>
                </fieldset>
            </div>
        </form>
    </main>
</body>
<script>
    //ログイン判定
    //phpから受け取った変数judgeがtureであればサインイン成功
    const judge = <?= $judge ?>;
    console.log(judge)
    if (judge) {
        alert('サインイン成功')
        window.location.href = "index.php";
    } else {
        alert('サインインできません')
        window.location.href = ' index.php';
    }
    // 
</script>

</html>