<?php
// var_dump($_POST);
// exit();

$name = $_POST['name'];
$nameKana = $_POST['nameKana'];
$gender = $_POST['gender'];
$averageScore = $_POST['averageScore'];
$yearsOfExperience = $_POST['yearsOfExperience'];
$availableDays = $_POST['availableDays'];
$residence = $_POST['residence'];
$activityArea = $_POST['activityArea'];
$freeFormat = $_POST['freeFormat'];



// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$freeFormat} {$activityArea} {$residence} {$availableDays} {$yearsOfExperience} {$averageScore} {$gender} {$nameKana} {$name}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/data.txt', 'a');

// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:todo_txt_input.php");
exit();
