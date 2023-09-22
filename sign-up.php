<?php
session_start();

include("db_connect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $fullname = $firstname . " " . $lastname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $bday = $_POST['bday'];
    $course =  $_POST['course'];

    if (!empty($fullname) && !empty($password) && !empty($email) && !empty($bday) && !empty($course)) {
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            echo "Email already exists. Please use a different email.";
        } else {
            $query = "insert into users (name, birthday, course, email, password) 
                          values ('$fullname', '$bday', '$course', '$email', '$password')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                header("Location: index.php");
                die;
            } else {
                echo "Error inserting data into the database.";
            }
        }
    } else {
        echo "Please enter some valid information!";
    }
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
    <title>Sign Up</title>
</head>

<body>
    <article data-aos="flip-left">
        <h1>Sign Up</h1>
        <form method="post">
            <input type="text" name="fname" placeholder="First name" required autocapitalize="on">
            <input type="text" name="lname" placeholder="Last name" required autocapitalize="on">
            <input type="text" name="email" placeholder="Email" required>
            <input type="text" name="course" placeholder="Course" required autocapitalize="on">
            <input type="password" name="password" placeholder="Password" required>
            <label for="date">Birthday
                <input type="date" id="date" name="bday">
            </label>
            <button type="submit" name="submit" value="submit">Create Account</button>
        </form>
        <p>Already have an account?<a href="./index.php"> Login</a></p>
    </article>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>