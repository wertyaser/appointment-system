<?php
session_start();

include "db_connect.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $pass = md5($pass);

  $sql = "SELECT * FROM admin WHERE email='$email' AND password='$pass'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $email && $row['password'] === $pass) {
      $_SESSION['email'] = $row['email'];
      $_SESSION['password'] = $row['password'];
    }
  }
  header("Location: ./pages/my-account.php");
}
