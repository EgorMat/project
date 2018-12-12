<html>
    <head>
    <meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
    <link rel="stylesheet" href="css/style.css">
    <title>Registration</title>
    </head>
    <body class="mainPage">
    <h2>Registration</h2>
    <form action="save_user.php" method="post">
    <!--**** save_user.php - это адрес обработчика.  То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей  отправятся на страничку save_user.php методом "post" ***** -->
<p>
    <label>Login:<br></label>
    <input name="login" type="text" size="15" maxlength="15" required>
    </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->
<p>
    <label>Your password:<br></label>
    <input name="password" type="password" size="15" maxlength="15" required>
    </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->
<p>
    <input type="submit" name="submit" value="Register">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->
</p></form>
    </body>
    </html>
