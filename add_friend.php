<?php
session_start();
function getUserIdByLogin($login) {
  $quer = "SELECT id FROM users WHERE login = '$login'";
  $lin = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($lin));
  $resul = mysqli_query($lin, $quer) or die("Ошибка " . mysqli_error($lin));
  $id = mysqli_fetch_row($resul);
  $id = $id[0];
  return $id;
}

if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == ''){
     unset($login);
   }
}
$link = mysqli_connect("localhost","root","", "reg2018") or die("Mistake " . mysqli_error($link));

$sender_id = $_SESSION['id'];
$sid = getUserIdByLogin($login);

$q = "SELECT * FROM users_friends WHERE user_id = '$sender_id' AND friend_id='$sid'";
$r = mysqli_query($link, $q) or die("Ошибка " . mysqli_error($link));
$f = mysqli_fetch_row($r);
  if (!$f[0])
  {
    $a = "SELECT * FROM friends_requests WHERE (sender_id = '$sender_id' AND taker_id='$sid') OR (sender_id = '$sid' AND taker_id='$sender_id')";
    $b = mysqli_query($link, $a) or die("Ошибка " . mysqli_error($link));
    $c = mysqli_fetch_row($b);
if(!$c[0]){
  $query1 = "SELECT id FROM users WHERE login = '$login'";
  $result1 = mysqli_query($link, $query1) or die("Ошибка " . mysqli_error($link));
  $taker_id = mysqli_fetch_row($result1);
  $taker_id = (int)$taker_id[0];
  $sender_id = (int)$sender_id;

  $query ="INSERT INTO friends_requests (sender_id, taker_id, accept) VALUES ($sender_id, $taker_id, 0)";
  $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
}
}
?>
