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
  $id = mysqli_fetch_row($result1);
  $id = $id[0];
  return $id;
}

session_start();

$login =  $_SESSION['login'];
$id = $_SESSION['id'];


$link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));
$query3 = "SELECT friend_id FROM users_friends WHERE user_id = $id";
  $result3 = mysqli_query($link, $query3) or die("Ошибка " . mysqli_error($link));
  if($result3)
  {
   $rows = mysqli_num_rows($result3); // количество полученных строк
   echo "<div class='friends'>Friends";
   for ($i = 0 ; $i < $rows ; ++$i)
    {
       $row = mysqli_fetch_row($result3);
        echo "<div>";
          for ($j = 0 ; $j < 1 ; ++$j)
          $a = getUserLoginById($row[$j]);
           echo $a;
        echo "</div>";
    }
   echo "</div>";
       mysqli_free_result($result3);
  }
 ?>

 <script src="./addToFriends.js"></script>
</html>
