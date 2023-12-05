<?php
session_start();
include("db_connect.php");
?>

<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./pico-master/css/pico.css" /> -->
    <link rel="stylesheet" href="./css/output.css" />
    <title>Home</title>
    </head>

    <body>
        <div class="min-h-screen bg-cover bg-center isolation relative" style="background-image: url('images/auth-bg.jpg');">
            <div class="FadedOverlay absolute inset-0 bg-bckgrd opacity-70 z-10"></div>

            <nav class="bg-bckgrd w-full top-0 start-0 border-b-4 border-accent z-20 relative">
                <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <a class="flex items-center space-x-3 rtl:space-x-reverse" href="home.php">
                        <img src="./images/Logo.png" class="h-8">
                        <span class="self-center text-lg font-bold whitespace-nowrap text-black">Student Management System</span>
                    </a>
                    <div class="flex items-center space-x-4">
                        <a href="my-account.php" class="self-center text-lg font-normal whitespace-nowrap text-black">My Account</a>
                        <a href="logout.php">
                            <img src="./images/sign-out-alt.png" alt="Logout" class="h-6 w-6 text-pink" />
                        </a>
                    </div>
                </div>
            </nav>

            <div class="mx-auto max-w-5xl w-11/12 py-8 z-20 relative mt-10">
                <h1 class="font-bold text-7xl text-left mb-3">Welcome!</h1>
                <p class="font-light text-justify mb-8">
                    Our Student Management System prioritizes security and privacy. Each student has exclusive access to their own account, ensuring the confidentiality of personal information. Administrators can efficiently manage student data, track academic progress, and communicate effectively with the student body.
                </p>

                <p class="font-light text-justify mb-4">
                    We strive to create an environment that promotes collaboration, transparency, and efficiency in academic administration. Welcome to a platform that empowers both administrators and students, fostering a more connected and informed educational community.
                </p>
            </div> 
        </div>
        
        <!-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
                AOS.init();
        </script> -->
    </body>

</html>