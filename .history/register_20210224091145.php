<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フォーム</title>
</head>

<body>
    <h1>ユーザー登録</h1>
    <form name="form1" method="post" action="confirm.php">
        <table>
            <tr>
                <th>制：</th>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><?php echo $email; ?></td>
            </tr>
            <tr>
                <th>血液型：</th>
                <td><?php echo $blood; ?></td>
            </tr>
            <tr>
                <th>お問い合わせ：</th>
                <td><?php echo $message; ?></td>
            </tr>
        </table>
    </form>
</body>

</html>