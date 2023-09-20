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
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pico-master/css/pico.css" />
    <link rel="stylesheet" href="./css/login.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <article data-aos="flip-left">
        <h1>Login</h1>
        <form method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="./sign-up.php">Create an account</a>
    </article>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>