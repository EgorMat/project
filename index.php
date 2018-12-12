<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>

    <html>
    <head>
    <meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Home page</title>
    </head>
    <body class="mainPage">
    <h2>Home page</h2>
    <form action="testreg.php" method="post">

    <!--****  testreg.php - это адрес обработчика. То есть, после нажатия на кнопку  "Login", данные из полей отправятся на страничку testreg.php методом  "post" ***** -->
    <label>Login:<br>
    <input  name="login" type="text" size="15" maxlength="15">
</label>


    <!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин ***** -->



    <label>Password:<br>
    <input name="password" type="password" size="15" maxlength="15">
</label>

    <!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль ***** -->


    <input type="submit" name="submit" value="Login">

    <!--**** Кнопочка (type="submit") отправляет данные на страничку testreg.php ***** -->
<br>
 <!--**** ссылка на регистрацию, ведь как-то же должны гости туда попадать ***** -->
<a href="reg.php">Registration</a>

  </form>
    <br>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id']))
    {
    // Если пусты, то мы не выводим ссылку
    echo "You are logged in as a guest.<br><a href='#'>This link is only available to registered users.</a>";
    }
    else
    {

    // Если не пусты, то мы выводим ссылку
    echo "You are logged in as ".$_SESSION['login']."<br><a  href='https://ru.wikipedia.org/wiki/%D0%A4%D0%B0%D0%BA%D1%83%D0%BB%D1%8C%D1%82%D0%B5%D1%82_%D0%BF%D1%80%D0%B8%D0%BA%D0%BB%D0%B0%D0%B4%D0%BD%D0%BE%D0%B9_%D0%BC%D0%B0%D1%82%D0%B5%D0%BC%D0%B0%D1%82%D0%B8%D0%BA%D0%B8_%E2%80%94_%D0%BF%D1%80%D0%BE%D1%86%D0%B5%D1%81%D1%81%D0%BE%D0%B2_%D1%83%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D1%8F_%D0%A1%D0%B0%D0%BD%D0%BA%D1%82-%D0%9F%D0%B5%D1%82%D0%B5%D1%80%D0%B1%D1%83%D1%80%D0%B3%D1%81%D0%BA%D0%BE%D0%B3%D0%BE_%D0%B3%D0%BE%D1%81%D1%83%D0%B4%D0%B0%D1%80%D1%81%D1%82%D0%B2%D0%B5%D0%BD%D0%BD%D0%BE%D0%B3%D0%BE_%D1%83%D0%BD%D0%B8%D0%B2%D0%B5%D1%80%D1%81%D0%B8%D1%82%D0%B5%D1%82%D0%B0'>PM.</a>";
    }
    ?>
    </body>
    </html>
