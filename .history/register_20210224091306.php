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
                <th>姓：</th>
                <td><?php echo $name_1; ?></td>
            </tr>
            <tr>
                <th>名：</th>
                <td><?php echo $ename; ?></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><?php echo $blood; ?></td>
            </tr>
        </table>
    </form>
</body>

</html>