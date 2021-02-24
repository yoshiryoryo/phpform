<?php
// CSRF対策の固定トークンを生成
if ( !isset( $_SESSION[ 'ticket' ] ) ) {
    // セッション変数にトークンを代入
    $_SESSION[ 'ticket' ] = sha1( uniqid( mt_rand(), TRUE ) );
  }
   
//トークンを変数に代入
  $ticket = $_SESSION[ 'ticket' ];

?>

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
                <td><input type="text" class="name" name="name_1" size="20" maxlength="10" placeholder="ヤマダ" required></td>
            </tr>
            <tr>
                <th>名：</th>
                <td><input type="text" class="name" name="name_2" size="20" maxlength="10" placeholder="タロウ" required></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><input type="email" name="email" size="50" maxlength="254" required></td></tr>
            </tr>
        </table>
        <input id="send" type="submit" value="登録">
    </form>
</body>

<script>
    
    function (str){
  str = (str==null)?"":str;
  if(str.match(/^[ァ-ヶー　]+$/)){    //"ー"の後ろの文字は全角スペースです。
    return true;
  }else{
    return false;
  }
}
</script>

</html>