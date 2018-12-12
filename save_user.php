 <html>
    <head>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
    </head>
<?php
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
 if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("You have not entered all the information, go back and fill in all the fields!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
  $id = random_int(1, 1000000000);
  $login = stripslashes($login);
    $login = htmlspecialchars($login);
 $password = stripslashes($password);
    $password = htmlspecialchars($password);
 //удаляем лишние пробелы
    $login = trim($login);
    $password = trim($password);
 // подключаемся к базе
    include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь
 // проверка на существование пользователя с таким же логином
    $result = mysqli_query($db,"SELECT id FROM users WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Sorry, the login you entered is already registered. Enter another login.");
    }
 // если такого нет, то сохраняем данные
    $result2 = mysqli_query($db,"INSERT INTO users (id, login,password) VALUES('$id','$login','$password')");
    // Проверяем, есть ли ошибки
    if ($result2=='TRUE')
    {
    echo "You have successfully registered! Now you can go to the site. <a href='index.php'>Home page</a>";
    }
 else {
    echo "Mistake! You are not registred.";
    }
    ?>
 </html>
