<?php
session_start();
if (!isset($_SESSION['token']) || !isset($_POST['token']) || $_SESSION['token'] !== $_POST['token']) {
    die('不正なリクエストです。処理を中断します..');
    echo $_SESSION['token'], $_POST['token'];
}

unset($_SESSION['token']);
function escape($val)
{
    return htmlspecialchars($val, ENT_QUOTES | ENT_HTML5, 'UTF-8');
}

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>ユーザー登録フォーム</h1>
        <form action="member.php" method="post" class="">
            <table class="table table-bordered">
                <caption>ご入力内容</caption>
                <tr>
                    <th>姓：</th>
                    <td><?php echo $name_1; ?></td>
                </tr>
                <tr>
                    <th>名：</th>
                    <td><?php echo $name_2; ?></td>
                </tr>
                <tr>
                    <th>メールアドレス：</th>
                    <td><?php echo $email; ?></td>
                </tr>
            </table>
            <input id="send" type="submit" value="登録" class="btn btn-primary">
        </form>
    </div>
</body>

</html>