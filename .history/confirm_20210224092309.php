<?php
// セッションの開始
session_start();

$name_1 = htmlspecialchars($_POST['name_1'], ENT_QUOTES, 'UTF-8');
$name_2 = htmlspecialchars($_POST['name_2'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');


// 入力値をセッション変数に格納
$_SESSION['name_1'] = $name;
$_SESSION['name_1'] = $name;
$_SESSION['email'] = $email;
$_SESSION['blood'] = $blood;
$_SESSION['message'] = $message;
?>
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>ユーザー登録フォーム(confirm)</title>
<style>
h1 {
  margin-left: 50px;
}
th {
  width: 200px;
  margin: 10px 0;
}
input#send {
  margin-left: 100px;
  margin-top: 30px;
}
</style>
</head>

<body>
<h1>ユーザー登録フォーム(confirm)</h1>
<form action="submit.php" method="post">
<table>
<tr><th>お名前：</th><td><?php echo $name; ?></td></tr>
<tr><th>メールアドレス：</th><td><?php echo $email; ?></td></tr>
<tr><th>血液型：</th><td><?php echo $blood; ?></td></tr>
<tr><th>お問い合わせ：</th><td><?php echo $message; ?></td></tr>
</table>
<input id="send" type="submit" value="登録">
</form>
</body>
</html>