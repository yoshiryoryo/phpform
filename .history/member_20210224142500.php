
<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>登録情報</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<table class="table table-bordered">
<?php
    foreach($stmt as $row) { 
    ?>
    <tr>
       <td> <? echo $row['name_1']; ?> </td>
       <td> <? echo $row['name_2']; ?> </td>
       <td> <? echo $row['email']; ?> </td>
    </tr>
 <?php }
?>
</table>


<p><a href="register.php">入力画面に戻る</a></p>
</body>

</html>