<?php
session_start();

include("db_connect.php");
include("functions.php");
$user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/output.css">
    <!-- <link rel="stylesheet" href="pico-master/css/pico.min.css" /> -->
    <title>My Account</title>
</head>

<body class="bg-blue min-h-screen py-32">
    <nav
        class="text-pink border border-pink max-w-xl rounded-full p-4 w-11/12 fixed top-4 left-1/2 -translate-x-1/2 flex items-center gap-3">
        <img src="./images/logo.png" alt="lobot logo" class="w-[30px] block mr-auto">
        <button class=""><a href="my-account.php">My account</a></button>
        <a href="logout.php"><svg class="text-pink" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-log-out">
                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                <polyline points="16 17 21 12 16 7" />
                <line x1="21" x2="9" y1="12" y2="12" />
            </svg></a>
    </nav>
    <h1 class="ml-[5%] font-display text-5xl mb-8 text-pink">My Account: Hello,
        <?php echo $user_data['name']; ?>
    </h1>
    <main class="max-w-2xl mx-auto w-11/12 text-pink">

        <div class="container border border-pink rounded-3xl py-6 px-12">
            <h4 class="text-center text-4xl font-display mb-4">Student details</h4>
            <?php
            $id = $user_data['student_id'];
            $query = "SELECT * from users where student_id = '$id' limit 1";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['student_id'];
                    $name = $row['name'];
                    $birthday = $row['birthday'];
                    $course = $row['course'];
                    $email = $row['email'];
                    $password = $row['password'];
                    echo '<article>
                    <h2 style="margin: 0;" class="text-xl lg:text-2xl mb-2">Name: ' . $name . '</h2>
                    <h2 style="margin: 0;" class="text-xl lg:text-2xl mb-2">Birthday: ' . $birthday . '</h2>
                    <h2 style="margin: 0;" class="text-xl lg:text-2xl mb-2">Course: ' . $course . '</h2>
                    <h2 style="margin: 0;" class="text-xl lg:text-2xl mb-2">Email: ' . $email . '</h2>
                    <h2 style="margin: 0;" class="text-xl lg:text-2xl">Password: ' . $password . '</h2>
                    <br><br>
                    <a class="border border-white bg-pink rounded-md block w-fit py-2 px-4 text-white hover:bg-pink-violet transition-all mx-auto" href=" update.php?update_id=' . $id . '" role="button" >Update</a>
                    </article>
                    ';
                }
            }
            ?>
        </div>
    </main>
</body>

</html>