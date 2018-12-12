<?php
session_start();
if (isset($_POST['friendLogin'])) {
  $friendLogin = $_POST['friendLogin'];
  if ($friendLogin == ''){
     unset($friendLogin);
   }
}
$link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));

$query1 = "SELECT id FROM users WHERE login = '$friendLogin'";
$result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
$user1 = mysqli_fetch_row($result1);
$user1 = (int)$user1[0];
$user2 = $_SESSION['id'];

$query ="INSERT INTO users_friends (user_id, friend_id) VALUES ($user1, $user2)";
$quer ="INSERT INTO users_friends (user_id, friend_id) VALUES ($user2, $user1)";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
$resul = mysqli_query($link, $quer) or die("Ошибка " . mysqli_error($link));

$q ="DELETE FROM friends_requests WHERE sender_id = $user1 AND taker_id = $user2";
$res = mysqli_query($link, $q) or die("Ошибка " . mysqli_error($link));
 ?>
