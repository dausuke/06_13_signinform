<?php
// CSVファイル読み込み
$file = fopen('data/userdata.csv', 'r');
$user_data_array = array();

flock($file, LOCK_EX);
// 1行ずつCSVを配列に変換して$user_data_arrayに格納。
while ($line = fgetcsv($file)) {
    $user_data_array[] = $line;
}
flock($file, LOCK_UN);
fclose($file);

//年齢、都道府県のデータを取り出し、$ageと$cityに格納
$age = array_column($user_data_array, '1');
$city = array_column($user_data_array, '2');

// 作成した配列を出力
print_r($city);