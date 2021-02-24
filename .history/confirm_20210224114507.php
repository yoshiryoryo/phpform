<?php
session_start();
if(!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] !== $_POST['token']) {
    die()
} 

// セッションの開始
session_start();

$name_1 = htmlspecialchars($_POST['name_1'], ENT_QUOTES, 'UTF-8');
$name_2 = htmlspecialchars($_POST['name_2'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');


// 入力値をセッション変数に格納
$_SESSION['name_1'] = $name_1;
$_SESSION['name_2'] = $name_2;
$_SESSION['email'] = $email;


?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>確認ページ</title>

</head>

<body>
<h1>ユーザー登録フォーム</h1>
<form action="member.php" method="post">
<table>
<tr><th>姓：</th><td><?php echo $name_1; ?></td></tr>
<tr><th>名：</th><td><?php echo $name_2; ?></td></tr>
<tr><th>メールアドレス：</th><td><?php echo $email; ?></td></tr>
</table>
<input id="send" type="submit" value="登録">
</form>
</body>
</html>