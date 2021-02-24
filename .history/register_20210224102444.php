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
                <td><input type="text" name="name_1" size="20" maxlength="10" placeholder="ヤマダ" required></td>
            </tr>
            <tr>
                <th>名：</th>
                <td><input type="text" name="name_2" size="20" maxlength="10" placeholder="タロウ" required></td>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><input type="email" name="email" size="50" maxlength="254" required></td></tr>
            </tr>
        </table>
        <input id="send" type="submit" value="登録">
    </form>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<script>
jQuery(function($){
  
  //エラーを表示する関数（error クラスの p 要素を追加して表示）
  function show_error(message, this$) {
    text = this$.parent().find('label').text() + message;
    this$.parent().append("<p class='error'>" + text + "</p>");
  }
  
  //フォームが送信される際のイベントハンドラの設定
  $("#main_contact").submit(function(){
    //エラー表示の初期化
    $("p.error").remove();
    $("div").removeClass("error");
    var text = "";
    $("#errorDispaly").remove();
    
    //メールアドレスの検証
    var email =  $.trim($("#email").val());
    if(email && !(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/gi).test(email)){
      $("#email").after("<p class='error'>メールアドレスの形式が異なります</p>");
    }
    //確認用メールアドレスの検証
    var email_check =  $.trim($("#email_check").val());
    if(email_check && email_check != $.trim($("input[name="+$("#email_check").attr("name").replace(/^(.+)_check$/, "$1")+"]").val())){
      show_error("が異なります", $("#email_check"));
    }
    
 
    //error クラスの追加の処理
    if($("p.error").length > 0){
      $("p.error").parent().addClass("error");
      $('html,body').animate({ scrollTop: $("p.error:first").offset().top-180 }, 'slow');
      return false;
    }
  });
})
</script>

</html>