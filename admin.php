<?php
session_start();
include 'db_connect.php';
include("functions.php");
$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <title>Admin</title>
</head>

<body class="bg-blue min-h-screen">
    <main class="mx-auto w-11/12 max-w-7xl">
        <div class="flex justify-between pt-24 mb-10">
            <h1 class="text-pink font-display text-5xl">Admin</h1>
            <div class="flex gap-3">
                <button class="p-3 bg-pink text-white rounded-full border border-white font-md shadow-md px-6"><a href="user.php">ADD USER</a></button>
                <button class="p-3 bg-pink text-white rounded-full border border-white font-md shadow-md px-6"><a href="user.php">LOG OUT</a></button>
            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
            <table class="w-full text-xl text-left ">
                <thead class="text-xl text-white uppercase bg-pink ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Student ID
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
                            Password
                        </th>
                        <th scope="col" class="px-6 py-3">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <tr class="border-b font-medium whitespace-nowrap text-white">
                        <td class="px-6 py-4">
                            1
                        </td>
                        <td class="px-6 py-4">
                            Leoniel Nacman
                        </td>
                        <td class="px-6 py-4">
                            30/10/2001
                        </td>
                        <td class="px-6 py-4">
                            BSIT
                        </td>
                        <td class="px-6 py-4">
                            leoniel@gmail.com
                        </td>
                        <td class="px-6 py-4">
                            leoniel
                        </td>

                    </tr> -->
                    <?php

                    $query = "SELECT * from users";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['student_id'];
                            $name = $row['name'];
                            $birthday = $row['birthday'];
                            $course = $row['course'];
                            $email = $row['email'];
                            $password = $row['password'];
                            echo '<tr class="border-b font-medium whitespace-nowrap text-white">
                            <td class="px-6 py-4">' . $id . '</td>
                            <td class="px-6 py-4">' . $name . '</td>
                            <td class="px-6 py-4">' . $birthday . '</td>
                            <td class="px-6 py-4">' . $course . '</td>
                            <td class="px-6 py-4">' . $email . '</td>
                            <td class="px-6 py-4">' . $password . '</td>
                          
                          <td>
                          <button class="btn btn-warning"><a class="text-light" href="update.php?update_id=' . $id . '">Edit</a></button>
                          <button class="btn btn-danger"><a class="text-light" href="delete.php?deleteid=' . $id . '">Delete</a></button>
                      </td></tr>
                     ';
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>

    </main>
</body>

</html>