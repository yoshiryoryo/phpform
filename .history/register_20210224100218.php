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
                <td><input type="text" name="name_!" size="20" maxlength="10" placeholder="山田" required></td>
            </tr>
            <tr>
                <th>名：</th>
                <td><input type="text" name="name" size="20" maxlength="10" placeholder="太郎" required></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><input type="email" name="email" size="50" maxlength="254" required></td></tr>
            </tr>
        </table>
        <input id="send" type="submit" value="登録">
    </form>
</body>

</html>