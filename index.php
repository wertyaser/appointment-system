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
                    $_SESSION['user_id'] = $email;
                    header("Location: my-account.php");
                }
            }
        }
        echo "Wrong Username or Password!";
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
    <title>Login</title>
</head>

<body class="bg-violet min-h-screen flex">
    <article data-aos="flip-left"
        class="m-auto max-w-2xl w-11/12 border-2 border-pink rounded-2xl overflow-hidden flex">

        <div class="flex p-8 w-full">
            <form method="post" class="m-auto">
                <h1 class="mb-6 text-white text-2xl text-center">Sign In</h1>
                <input type="email" name="email" placeholder="Email" required
                    class="mb-2 block bg-violet border border-white px-4 py-2 rounded-lg text-white">
                <input type="password" name="password" placeholder="Password" required
                    class="mb-2 block bg-violet border border-white px-4 py-2 rounded-lg text-white">

                <button type="submit" class="bg-pink text-white rounded-lg px-4 py-2 text-sm w-full mb-2">Sign
                    In</button>
                <p class="text-white">Don't have an account?<a href="./sign-up.php"> Signup</a></p>
            </form>
        </div>
        <div class="h-full w-[300px] shrink-0 hidden md:block">
            <img src="./images/auth-image.png" alt="a person attempting to smile but failed."
                class="h-full w-full object-cover">
        </div>




    </article>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>