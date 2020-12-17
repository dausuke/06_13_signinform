<?php
//新規登録
//データ受信
$createemail = $_POST['createmail'];

//受信したデータをjson形式へエンコード
$json_data = json_encode($createemail);
// var_dump($createemail);
// exit();

//ファイル書き込み
$file_a = fopen('data/sign_in.txt', 'a');
flock($file_a, LOCK_EX);
fwrite($file_a, $json_data . "\r\n");
flock($file_a, LOCK_UN);
fclose($file_a);
// header('Location: index.php');

//認証コード生成
$authentication_code = '';
for ($count = 0; $count < 6; $count++) {
    $authentication_code .= rand(1, 6);
}
// var_dump($authentication_code);
// exit();

$to = $createemail;
$subject = "認証コードの確認";
$message = "ご登録ありがとうございます。\r\n下記の認証コードを登録フォームに入力してください。\r\n\r\n\r\n---------------------\r\n\r\n{$authentication_code}\r\n\r\n---------------------";
$headers = "From: phpkadai06@gmail.com";
mb_send_mail($to, $subject, $message, $headers);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/signin.css">
    <title>sign-up</title>
</head>

<body>
    <div class="authentication" id="fadeout-content">
        <p>確認コードを入力してください</p>
        <input type="number" name="createnumber" id='createnumber'>
        <button id="next">next</button>
    </div>
    <form class="signup-content" id="fadein-content" action="" method="post">
        <fieldset>
            氏名:<input type="text" name="name" placeholder="古閑　大輔">
            年齢:<input type="text" name="age" placeholder="26">
            <select type="text" name="age">
             <optgroup label="">
                    <option>性別</option>
                    <option>男性</option>
                    <option>女性</option>
                    <option>指定しない</option>
                </optgroup>
            </select>
            <select type="text" name="city">
                <optgroup label="">
                    <option>都道府県</option>
                    <option>北海道</option>
                    <option>青森</option>
                    <option>岩手</option>
                    <option>宮城</option>
                    <option>秋田</option>
                    <option>山形</option>
                    <option>福島</option>
                    <option>茨城</option>
                    <option>栃木</option>
                    <option>群馬</option>
                    <option>埼玉</option>
                    <option>千葉</option>
                    <option>東京</option>
                    <option>神奈川</option>
                    <option>新潟</option>
                    <option>富山</option>
                    <option>石川</option>
                    <option>福井</option>
                    <option>山梨</option>
                    <option>長野</option>
                    <option>岐阜</option>
                    <option>静岡</option>
                    <option>愛知</option>
                    <option>三重</option>
                    <option>滋賀</option>
                    <option>京都</option>
                    <option>大阪</option>
                    <option>兵庫</option>
                    <option>奈良</option>
                    <option>和歌山</option>
                    <option>鳥取</option>
                    <option>島根</option>
                    <option>岡山</option>
                    <option>広島</option>
                    <option>山口</option>
                    <option>徳島</option>
                    <option>香川</option>
                    <option>愛媛</option>
                    <option>高知</option>
                    <option>福岡</option>
                    <option>佐賀</option>
                    <option>長崎</option>
                    <option>熊本</option>
                    <option>大分</option>
                    <option>宮崎</option>
                    <option>鹿児島</option>
                    <option>沖縄</option>
                </optgroup>
            </select>
            パスワード:<input type="text" name="password">
            <button id="signup">submit</button>
        </fieldset>
    </form>

    <script>
        $('#next').on('click', function() {
            const createnumber = $('#createnumber').val();
            if (createnumber == <?= $authentication_code ?>) {
                //画面の切り替え
                $('#fadein-content').fadeIn(100);
                $('#fadeout-content').addClass('none');
            };
        });
    </script>

</body>

</html>