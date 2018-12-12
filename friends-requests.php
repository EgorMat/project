<html>
<head>
<link rel="stylesheet" href="css/style.css">
<meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>
<?php
include('header.php');


function getUserLoginById($id) {
  $query1 = "SELECT login FROM users WHERE id = $id";
  $link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));
  $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
  $login = mysqli_fetch_row($result1);
  $login = $login[0];
  return $login;
}

session_start();

$login =  $_SESSION['login'];
$id = $_SESSION['id'];


$link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));
     $query2 = "SELECT sender_id FROM friends_requests WHERE taker_id = $id AND accept = 0";
       $result2 = mysqli_query($link, $query2) or die("Ошибка " . mysqli_error($link));
       if($result2)
       {
        $rows = mysqli_num_rows($result2); // количество полученных строк
        echo "<div class='friendsRequests'>Friends Requests ";
        for ($i = 0 ; $i < $rows ; ++$i)
         {
            $row = mysqli_fetch_row($result2);
             echo "<div class='acceptButton'>";
               for ($j = 0 ; $j < 1 ; ++$j)
               $a = getUserLoginById($row[$j]);
                echo $a;
             echo "</div>";
         }
        echo "</div>";
            mysqli_free_result($result2);
       }
 ?>

 <script src="./addToFriends.js"></script>
</html>
