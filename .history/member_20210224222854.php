<?php

// セッションの開始
session_start();

$name_1 = htmlspecialchars($_SESSION['name_1'], ENT_QUOTES, 'UTF-8');
$name_2 = htmlspecialchars($_SESSION['name_2'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');

// 接続設定
$user = 'fqqwmxbqmxmeas';
$pass = '335968c21762071614c3ad78dcc4b1de359535b6470e093ff8a944b35f8ab7d4';

// データベースに接続
$dsn = 'postgres://fqqwmxbqmxmeas:335968c21762071614c3ad78dcc4b1de359535b6470e093ff8a944b35f8ab7d4@ec2-54-164-238-108.compute-1.amazonaws.com:5432/d1gmvpqr51sc1a';
$conn = new PDO($dsn, $user, $pass); //「$conn」は、任意のオブジェクト名

// データの追加
$sql_create = 'INSERT INTO form(name_1, name_2, email) VALUES("' . $name_1 . '","' . $name_2 . '","' . $email . '")';
$stmt = $conn->prepare($sql_create);
$stmt->execute();

// SELECT文を変数に格納
$sql_read = pg_query('');

// SQLステートメントを実行し、結果を変数に格納
$stmt = $conn->query($sql_read);
$stmt->execute();
?>

<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>登録情報</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <h3>登録一覧</h3>
    <table class="table table-bordered">
    <tr>
           <th>姓</th>
           <th>名</th>
           <th>アドレス</th>
       </tr>
        <?php
        foreach ($stmt as $row) {
        ?>
            <tr>
                <td>
                    <?= $row['name_1']; ?>
                </td>
                <td>
                    <?= $row['name_2']; ?>
                </td>     
                <td>
                    <?= $row['email']; ?>
                </td>
            
        <?php }
        ?>
    </table>
    </div>


    <p><a href="index.php">入力画面に戻る</a></p>
</body>

</html>