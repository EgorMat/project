<html>
<head>
<link rel="stylesheet" href="css/style.css">
<meta http-equiv = "content-type" content = "text/html; charset = windows-1251">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>
<?php
include('header.php');
session_start();

$login =  $_SESSION['login'];
$id = $_SESSION['id'];


$link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));
$query ="SELECT login FROM users WHERE id != $id";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
if($result)
 {
  $rows = mysqli_num_rows($result); // количество полученных строк
  echo "<div class='usersList'>Users List";
  for ($i = 0 ; $i < $rows ; ++$i)
 {
      $row = mysqli_fetch_row($result);
     echo "<div class='userLink'>";
       for ($j = 0 ; $j < 1 ; ++$j) echo "<td>$row[$j]</td>";
     echo "</div>";
 }
  echo "</div>";
      mysqli_free_result($result);
}
 ?>

 <script src="./addToFriends.js"></script>
</html>
