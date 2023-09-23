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
    $course = $_POST['course'];

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
                header("Location: admin.php");
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
    <link rel="stylesheet" href="./css/output.css">
    <title>Add User</title>
</head>

<body class="bg-blue min-h-screen flex">
    <div class="flex p-4 w-full">
        <form method="post" class="m-auto">
            <h1 class="mb-6 text-pink text-2xl text-center font-display ">Add-user</h1>

            <input type="text" name="fname" placeholder="First name" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">
            <input type="text" name="lname" placeholder="Last name" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">
            <input type="text" name="email" placeholder="Email" required class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">
            <input type="text" name="course" placeholder="Course" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">
            <input type="password" name="password" placeholder="Password" required class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">

            <input type="date" id="date" name="bday" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-white w-full">

            <div class="flex items-center gap-2 mb-2 flex-wrap">
                <button onclick="createUserAlert();" type="submit" class="bg-pink text-white rounded-lg py-2 text-sm w-full">Create user</button>
            </div>
        </form>
    </div>
    <script src="./js/functions.js"></script>
</body>

</html>