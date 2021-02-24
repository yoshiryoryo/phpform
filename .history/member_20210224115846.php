<?php

// セッションの開始
session_start();

$name_1 = htmlspecialchars($_SESSION['name_1'], ENT_QUOTES, 'UTF-8');
$name_2 = htmlspecialchars($_SESSION['name_2'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');

// 接続設定
$user = 'root';
$pass = '19920629';

// データベースに接続
$dsn = 'mysql:host=localhost;dbname=form;charset=utf8';
$conn = new PDO($dsn, $user, $pass); //「$conn」は、任意のオブジェクト名

// データの追加
$sql = 'INSERT INTO form(name_1, name_2, email) VALUES("'.$name_1.'","'.$name_2.'","'.$email.'")';
$stmt = $conn -> prepare($sql);
$stmt -> execute();
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録ユーザー</title>
</head>

<body>
<h1>現在の登録情報</h1>
<p><a href="register.php">入力画面に戻る</a></p>
</body>
</html>