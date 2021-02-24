<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javascript Validation Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="/style.css" rel="stylesheet"> 
    <style>

        /* inputのborderの色 */
        .success {
            border: 2px solid green;
        }

        .error {
            border: 2px solid red;
        }

        /* エラーメッセージの非表示 */
        #name_1-error-message {
            display: none;
        }

        #name_2-error-message {
            display: none;
        }

        #email-error-message {
            display: none;
        }
    </style>
</head>

<body>
<div class="container">
        <h3>登録フォーム</h3>
        <form id="form">
            <div>
                <label for="">姓</label>
                <input type="name" name="name_1" id="name_1">
                <span id="name_1-error-message">全角カナで入力してください</span>
            </div>
            <div>
                <label>名</label>
                <input type="name" name="name_2" id="name_2">
                <span id="name_2-error-message">全角カナで入力してください</span>
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" id="email">
                <span id="email-error-message">Emailの形式ではありません</span>
            </div>
            <div>
                <button id="btn">確認画面</button>
            </div>
        </form>
    </div>
    <script>

        //Element取得

        //form
        const form = document.getElementById("form");
        //form element
        const name_1 = document.getElementById("name_1");
        const name_2 = document.getElementById("name_2");
        const email = document.getElementById("email");
        //error message
        const name_1_error_message = document.getElementById("name_1-error-message")
        const name_2_error_message = document.getElementById("name_2-error-message")
        const email_error_message = document.getElementById("email-error-message")
        //button
        const btn = document.getElementById("btn");

        //バリデーションパターン
        const nameExp = /^[ァ-ヶー　]+$/;
        const emailExp = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\.[A-Za-z0-9]{1,}$/;

        //初期状態設定
        btn.disabled = true;

        //event

        //name_1
        name_1.addEventListener("keyup", e => {
            if (nameExp.test(name_1.value)) {
                name_1.setAttribute("class", "success");
                name_1_error_message.style.display = "none";
            } else {
                name_1.setAttribute("class", "error");
                name_1_error_message.style.display = "inline";
            }
            console.log(name_1.getAttribute("class").includes("success"));
            checkSuccess();
        })

        //name_2
        name_2.addEventListener("keyup", e => {
            if (nameExp.test(name_1.value)) {
                name_2.setAttribute("class", "success");
                name_2_error_message.style.display = "none";
            } else {
                name_2.setAttribute("class", "error");
                name_2_error_message.style.display = "inline";
            }
            console.log(name_2.getAttribute("class").includes("success"));
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
            if (name_1.value && name_2.value && email.value) {
                if (name_1.getAttribute("class").includes("success") 
                    && name_2.getAttribute("class").includes("success") 
                    && email.getAttribute("class").includes("success") 
                   ) {
                    btn.disabled = false;
                } else {
                    btn.disabled = true;
                }
            }
        }

        //submit
        btn.addEventListener("click", e => {
            e.preventDefault();
            form.method = "post";
            form.action = "confirm.php";
            form.submit();
        })

    </script>
</body>

</html>