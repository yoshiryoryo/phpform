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
$sql_create = 'INSERT INTO form(name_1, name_2, email) VALUES("'.$name_1.'","'.$name_2.'","'.$email.'")';
$stmt = $conn -> prepare($sql);
$stmt -> execute();

// SELECT文を変数に格納
$sql_read = "SELECT * FROM form";
 
// SQLステートメントを実行し、結果を変数に格納
$stmt = $dbh->query($sql);
 
// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {
 
  // データベースのフィールド名で出力
  echo $row['name_1'].$row['name_2'].$row['email'];
 
  // 改行を入れる
  echo '<br>';
}
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録情報</title>
</head>

<body>
<h1>現在の登録情報</h1>

<table>
       <tr>
           <th>姓</th>
           <th>job</th>
           <th>age</th>
       </tr>
<?php
foreach ($emp_data as $value) {
?>
       <tr>
           <td><?php print htmlspecialchars($value['emp_name'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['job'], ENT_QUOTES, 'UTF-8'); ?></td>
           <td><?php print htmlspecialchars($value['age'], ENT_QUOTES, 'UTF-8'); ?></td>
       }
?>
   </table>

<p><a href="register.php">入力画面に戻る</a></p>
</body>
</html>