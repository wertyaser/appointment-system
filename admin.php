<?php
session_start();
include 'db_connect.php';
include 'functions.php';
check_login($conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <title>Admin</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                    <div class="flex md:order-2">
                        <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search" aria-expanded="false" class="md:hidden text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 me-1">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                        </button>
                        <div class="relative hidden md:block">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search icon</span>
                        </div>
                        <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search...">
                    </div>
                    

                    <!-- <form method="post" class="flex gap-3">
                        <input type="text" placeholder="Search" name="search"
                        class="text-sm bg-transparent text-black rounded-lg border border-black focus:border-pink-black outline-none transition-all">
                        <button name="submit" class="text-black text-md rounded-md border border-black">Search</button>
                    </form> -->

                    <a href="my-account.php" class="self-center text-lg font-normal whitespace-nowrap text-black">My Account</a>
                    <a href="logout.php">
                        <img src="./images/sign-out-alt.png" alt="Logout" class="h-6 w-6 text-pink" />
                    </a>
                </div>
            </div>
        </nav>
    </div>


    <main class="mx-auto w-11/12 max-w-7xl h-full pb-16">
        
        <div class="flex justify-between pt-24 mb-10">
            <h1 class="text-white font-display text-5xl" data-aos="fade-right">Admin</h1>
            <div class="flex gap-3">
                <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                        href="add-user.php">ADD USER</a></button>
                <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                        href="logout.php">LOG OUT</a></button>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg " data-aos="flip-up">
            <table class="w-full text-xl text-left ">
                <thead class="text-xl text-white uppercase bg-pink ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Student ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Grade
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Birthday
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Course
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                        </th>
                    </tr>
                </thead>

                <?php

                $sql = "SELECT * FROM `users`";
                $result = mysqli_query($conn, $sql);

                // Check if the form is submitted and a search query is provided
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    // Filter users based on search query
                    $sql = "SELECT * FROM `users` WHERE student_id='$search' OR name LIKE '%$search%' OR email LIKE '%$search%' OR course LIKE '%$search%'";
                    $result = mysqli_query($conn, $sql);
                }

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['student_id'];
                        $name = $row['name'];
                        $birthday = $row['birthday'];
                        $course = $row['course'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $grade = $row['grade'];
                        echo '<tbody><tr class="border-b font-light whitespace-nowrap text-white">
                    <td class="px-6 py-4">' . $id . '</td>
                    <td class="px-6 py-4">' . $grade . '</td>
                    <td class="px-6 py-4">' . $name . '</td>
                    <td class="px-6 py-4">' . $birthday . '</td>
                    <td class="px-6 py-4">' . $course . '</td>
                    <td class="px-6 py-4">' . $email . '</td>
                    <td>
                    <button class="bg-pink p-3 rounded-lg"><a href="edit-admin.php?update_id=' . $id . '">Edit</a></button>
                    <button onclick="deleteUserAlert();" class="bg-violet p-3 rounded-lg"><a href="delete.php?delete_id=' . $id . '">Delete</a></button>
                </td></tr></tbody>';
                    }
                }
                ?>


            </table>
        </div>


        <div class="mx-auto max-w-3xl flex flex-col gap-2 mt-12">
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/between.php">Get Students Registered Between Last and First of this
                    month</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/in.php">Get students only enrolled as BSIT</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/max.php">Get the latest registered student</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/min.php">Get the oldest registered student</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/average.php">Get the average grade</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/sum.php">Get the sum grade</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/concat-string-date.php">View in summary format</a></button>
            <button class="p-3 bg-pink text-white rounded-md border border-white font-md shadow-md px-6"><a
                    href="./methods/count-group-by.php">Count students only enrolled as BSIT</a></button>
        </div>
    </main>


    
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="./js/functions.js"></script>
</body>

</html>