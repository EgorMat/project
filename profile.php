
 <html>
     <head>
     <link rel="stylesheet" href="css/style.css">
     <meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
     <title>My profile</title>
     </head>
     <body>
<?php
include('header.php');


     session_start();

     $login =  $_SESSION['login'];
     $id = $_SESSION['id'];

     echo "<div class='userInfo'>
     <div>Your id: $id</div>    <div>Your login: $login</div>
      </div>";









      ?>
<script src="./addToFriends.js"></script>
</body>
</html>
