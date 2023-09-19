<?php
session_start();
include "../db_connect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/my-account.css">
    <link rel="stylesheet" href="../pico-master/css/pico.css" />
    <title>My Account</title>
</head>

<body>
    <nav>
        <ul>
            <li>Logo</li>
        </ul>
        <ul>
            <a href="../logout.php" role="button">Log out</a>
        </ul>
    </nav>
    <main>
        <div class="header">
            <h1>MY ACCOUNT</h1>
            <h4>Student details</h4>
        </div>
        <div class="container">
            <input type="text" value="">
        </div>
    </main>
</body>

</html>