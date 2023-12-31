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
                <a class="flex items-center space-x-3 rtl:space-x-reverse" href="admin.php">
                    <img src="./images/Logo.png" class="h-8">
                    <span class="self-center text-lg font-bold whitespace-nowrap text-black">Student Management System</span>
                </a>
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <div class="z-10">
                        <div class="inline-block relative">
                            <button id="dropDownButton" class="hover:bg-gray-300 z-50 text-black text-lg py-1 px-4 rounded inline-flex items-center" onclick="toggleDropDown();">
                                <span class="mr-1">Admin Utilities</span>
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>

                            <ul id="dropDownItems" class="absolute hidden text-gray-700 pt-1 py-5 z-50">
                                <li class=""><a class="rounded-t bg-gray-200 hover:bg-gray-400 z-50 py-2 px-4 block whitespace-no-wrap" href="./methods/between.php">Get Students Registered Between Last and First of this month</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/in.php">Get students only enrolled as BSIT</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/max.php">Get the latest registered student</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/min.php">Get the oldest registered student</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/average.php">Get the average absences of all students</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/sum.php">Get the sum of absences</a></li>
                                <li class=""><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/concat-string-date.php">View in summary format</a></li>
                                <li class=""><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="./methods/count-group-by.php">Count students only enrolled as BSIT</a></li>
                            </ul>
                        </div>
                    </div>

                    <form method="post" class="relative hidden md:block">
                        <input type="text" name="search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-black rounded-full bg-bckgrd" placeholder="Search...">
                        <button type="submit" name="submit" class="absolute inset-y-0 start-0 flex items-center ps-3 z-50">
                            <img src="./images/search.png" alt="Logout" class="h-6 w-6 text-black" />
                        </button>
                    </form>

                    <a href="add-user.php">
                        <img src="./images/add-user.png" alt="Logout" class="h-6 w-6 text-black" />
                    </a>

                    <a href="logout.php">
                        <img src="./images/sign-out-alt.png" alt="Logout" class="h-6 w-6 text-black" />
                    </a>
                </div>
            </div>
        </nav>

        <div class="mx-auto max-w-5xl w-11/12 py-8 z-10 relative mt-10">
            <h1 class="font-bold text-7xl text-left mb-3">Dashboard</h1>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white border-b-4 border-solid border-accent" data-aos="flip-up">
                <table class="w-full text-sm text-left ">
                    <thead class="text-xl text-black uppercase bg-pink">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-black text-sm ">
                                Student ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm ">
                                Absent
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm ">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm ">
                                Birthday
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm ">
                                Course
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm ">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3 text-black text-sm text-left">
                                Actions
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
                        $sql = "SELECT * FROM `users` WHERE student_id='$search' OR name LIKE '%$search%' OR email LIKE '%$search%' OR course LIKE '%$search%' OR absent LIKE '%$search%'";
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
                            $absent = $row['absent'];
                            echo '<tbody><tr class="border-b font-light whitespace-nowrap text-black">
                                        <td class="px-6 py-4 text-sm text-black">' . $id . '</td>
                                        <td class="px-6 py-4 text-sm text-black">' . $absent . '</td>
                                        <td class="px-6 py-4 text-sm text-black">' . $name . '</td>
                                        <td class="px-6 py-4 text-sm text-black">' . $birthday . '</td>
                                        <td class="px-6 py-4 text-sm text-black">' . $course . '</td>
                                        <td class="px-6 py-4 text-sm text-black">' . $email . '</td>
                                        <td>
                                        <button class="bg-secondary hover:bg-green-200/[.6] transition-all px-3 py-3 rounded-lg"><a href="edit-admin.php?update_id=' . $id . '">Edit</a></button>
                                        <button onclick="deleteUserAlert();" class="bg-red-300 hover:bg-red-500/[.6] transition-all p-3 rounded-lg"><a href="delete.php?delete_id=' . $id . '">Delete</a></button>
                                    </td></tr></tbody>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="./js/functions.js"></script>
</body>

</html>