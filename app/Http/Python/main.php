<?php

header('Content-Type: text/html; charset=UTF-8');

try {
    $db = new PDO('mysql:dbname=syllabus;host=127.0.0.1;charset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'DBエラー' . $e->getMessage();
}

$url = 'json.json';
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json, true);

foreach($arr['月曜1限'] as $a) {
    foreach($a as $aa) {
        echo $aa;
        echo '<br><br>';
    }
}