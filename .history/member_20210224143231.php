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
$sql_create = 'INSERT INTO form(name_1, name_2, email) VALUES("' . $name_1 . '","' . $name_2 . '","' . $email . '")';
$stmt = $conn->prepare($sql_create);
$stmt->execute();

// SELECT文を変数に格納
$sql_read = "SELECT * FROM form";

// SQLステートメントを実行し、結果を変数に格納
$stmt = $conn->query($sql_read);

// foreach文で配列の中身を一行ずつ出力
foreach ($stmt as $row) {

    // データベースのフィールド名で出力
    echo $row['name_1'] . $row['name_2'] . $row['email'];

    // 改行を入れる
    echo '<br>';
}
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>登録情報</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <table>
        <?php
        foreach ($stmt as $row) {
        ?>
            <ｔｒ>
                <td>
                    <? echo $row['name_1']; ?>
                </td>
                <td>
                    <? echo $row['name_2']; ?>
                </td>     
                <td>
                    <? echo $row['email']; ?>
                </td>
            
        <?php }
        ?>
    </table>
    </div>


    <p><a href="register.php">入力画面に戻る</a></p>
</body>

</html>