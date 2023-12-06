<?php

session_start();

include("db_connect.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        $query = "select * from users where email = '$email' limit 1";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                if ($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['student_id'];
                    header("Location: home.php");
                }
            }
        }
        echo '<script type="text/javascript">alert("Wrong Email or Password") </script>';
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $emailAdmin = $_POST['email'];
    $passwordAdmin = $_POST['password'];
    if (!empty($emailAdmin) && !empty($passwordAdmin)) {
        $sqlAdmin = "SELECT * from admin WHERE username='$emailAdmin' AND password='$passwordAdmin' limit 1";
        $adminResult = mysqli_query($conn, $sqlAdmin);

        if ($adminResult) {
            $adminResult = mysqli_query($conn, $sqlAdmin);
            if ($adminResult && mysqli_num_rows($adminResult) > 0) {
                $user_data = mysqli_fetch_assoc($adminResult);
                if ($user_data['password'] === $passwordAdmin) {
                    $_SESSION['user_id'] = $user_data['id'];
                    header("Location: admin.php");
                }
            }
        }
        // echo "You are not an admin.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./pico-master/css/pico.css" /> -->
    <link rel="stylesheet" href="./css/output.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <title>Login</title>
</head>

<body class="font-sans min-h-screen py-20 bg-cover overflow-hidden" style="background-image: url(images/auth-bg.jpg)">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white bg-opacity-75 bg-blend-normal rounded-xl shadow-lg p-8 text-center transform scale-150 py-20 px-20" data-aos="fade-up" data-aos-duration="1000">
            <div class="Logo mx-auto"> 
                <img src="./images/Logo.png" class="mx-auto w-28">
            </div>
            <h1 class="font-bold text-3xl text-center mt-4">School Management System</h1>
            <p class="font-light text-sm text-center mt-3">Empowering students through accessible appointments.</p>

            <form method="post" class="mx-auto mt-8 max-w-md">
                <div class="relative mb-2">
                    <img src="./images/user.png" alt="user" class="absolute inset-y-0 left-2 w-6 h-6 mt-2">
                    <input type="email" name="email" placeholder="" required
                        class="pl-10 pr-4 py-2 block w-full bg-gray-500 bg-opacity-50 border border-gray border-opacity-0 rounded-lg text-black mb-3">
                <div class="relative mb-2">
                    <img src="./images/lock.png" alt="lock" class="absolute inset-y-0 left-2 w-6 h-6 mt-2">
                    <input type="password" name="password" placeholder="" required
                        class="pl-10 pr-4 py-2 block w-full bg-gray-500 bg-opacity-50 border border-gray border-opacity-0 rounded-lg text-black mb-3">

                <div class="flex justify-between">
                    <button type="submit"
                    style="background-color: #CBCDBC; color: black; font-family: 'Poppins', sans-serif;"
                        class="bg-opacity-75 text-black rounded-lg px-4 py-2 text-sm w-60 mr-6 h-9 flex text-center justify-center pt-2">Sign In</button>
                    <button type="button"
                    style="background-color: #C5D3CD; color: black; font-family: 'Poppins', sans-serif;"
                        class="bg-opacity-75 text-black rounded-lg px-4 py-2 text-sm w-60 h-9 flex text-center justify-center pt-2"> <a href="./sign-up.php">Sign Up</a></></button>   
            </form>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>