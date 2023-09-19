<?php
session_start();

include "db_connect.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
  $user_name = $_POST['uname'];
  $pass = $_POST['password'];

  $pass = md5($pass);

  $sql = "SELECT * FROM admin WHERE username='$user_name' AND password='$pass'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['username'] === $user_name && $row['password'] === $pass) {
      $_SESSION['username'] = $row['username'];
      $_SESSION['password'] = $row['password'];
    }
  }
  header("Location: ./pages/my-account.php");
}
