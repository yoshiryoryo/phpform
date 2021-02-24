<?php
// CSRF対策の固定トークンを生成
if (!isset($_SESSION['ticket'])) {
    // セッション変数にトークンを代入
    $_SESSION['ticket'] = sha1(uniqid(mt_rand(), TRUE));
}

//トークンを変数に代入
$ticket = $_SESSION['ticket'];

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
    <form name="form" method="post" action="confirm.php">
        <table>
            <tr>
                <th>姓：</th>
                <td><input type="text" id="name" name="name_1" size="20" maxlength="10" placeholder="ヤマダ" required></td>
                <span id="name-error-message">全角カナ入力してください</span>
            </tr>
            <tr>
                <th>名：</th>
                <td><input type="text" id="name" name="name_2" size="20" maxlength="10" placeholder="タロウ" required></td>
                <span id="name-error-message">全角カナ入力してください</span>
            </tr>
            <tr>
                <th>メールアドレス：</th>
                <td><input type="email" id="email" name="email" size="50" maxlength="254" required></td>
                <span id="email-error-message">Emailの形式にしてください</span>
            </tr>
            </tr>
        </table>
        <input id="send" type="submit" value="登録">
    </form>
</body>

<script>

        //Element取得

        //form
        const form = document.getElementById("form");
        //form element
        const name = document.getElementById("name");
        const email = document.getElementById("email");
        //error message
        const name_error_message = document.getElementById("name-error-message")
        const email_error_message = document.getElementById("email-error-message")
        //button
        const btn = document.getElementById("btn");

        //バリデーションパターン
        const nameExp = /^[a-z]{3,5}$/;
        const emailExp = /^[a-z]+@[a-z]+\.[a-z]+$/;

        //初期状態設定
        btn.disabled = true;

        //event

        //name
        name.addEventListener("keyup", e => {
            if (nameExp.test(name.value)) {
                name.setAttribute("class", "success");
                name_error_message.style.display = "none";
            } else {
                name.setAttribute("class", "error");
                name_error_message.style.display = "inline";
            }
            console.log(name.getAttribute("class").includes("success"));
            checkSuccess();
        })

        //email
        email.addEventListener("keyup", e => {
            if (emailExp.test(email.value)) {
                email.setAttribute("class", "success");
                email_error_message.style.display = "none";
            } else {
                email.setAttribute("class", "error");
                email_error_message.style.display = "inline";
            }
            checkSuccess();
        })


        //ボタンのdisabled制御
        const checkSuccess = () => {
            if (name.value && email.value && document.querySelector("input:checked[name=gender]")) {
                if (name.getAttribute("class").includes("success") 
                    && email.getAttribute("class").includes("success") 
                    && document.querySelector("input:checked[name=gender]").value) {
                    btn.disabled = false;
                } else {
                    btn.disabled = true;
                }
            }
        }

    </script>

</html>