<?php
session_start();
include("db_connect.php");

$id = $_GET['update_id'];
$sql = "SELECT * FROM users where student_id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$birthday = $row['birthday'];
$course = $row['course'];
$email = $row['email'];
$password = $row['password'];
$absent = $row['absent'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $absent = $_POST['absent'];

    $sql = "UPDATE users set student_id='$id', name='$name', birthday ='$birthday', course='$course', email='$email', password='$password', absent='$absent' WHERE student_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: admin.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pico-master/css/pico.min.css">
    <!-- <link rel="stylesheet" href="./css/update.css"> -->
    <link rel="stylesheet" href="./css/output.css">
    <title>Update</title>
    <script src="./js/functions.js" defer></script>

</head>

<body>
    <div class="min-h-screen bg-cover bg-center isolation relative" style="background-image: url('images/auth-bg.jpg')">
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
            <h1 class="font-bold text-7xl text-left mb-3">Edit Information</h1>
            <form method="post" class="mx-auto max-w-5xl w-11/12 py-2 z-20 relative mt-10">
                <div class="flex gap-2">
                    <div class="w-full">
                        <span>Name</span>
                        <input type="text" id="name" name="name" value="<?php echo $name ?>" required class="border border-black rounded-md text-black mb-3 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                    </div>
                    <div class="w-full">
                        <span>Birthday</span>
                        <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>" class="border border-black rounded-md text-black mb-3 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-full">
                        <span>Course</span>
                        <input type="text" id="course" name="course" value="<?php echo $course ?>" class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                    </div>
                    <div class="w-full">
                        <span>Absent</span>
                        <input type="number" id="grade" name="absent" value="<?php echo $absent ?>" class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                    </div>
                </div>
                <span>Email</span>
                <input type="email" id="email" name="email" value="<?php echo $email ?>" required class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                <span>Password</span>
                <input type="password" id="password" name="password" value="<?php echo $password ?>" required class="border border-black rounded-md text-black mb-3 min-w-0 px-6 py-4 block w-full justify-center bg-white bg-opacity-50" />
                <div class="flex gap-2">
                    <button type="button" onClick="handleClearFields()" class="px-6 py-4 rounded-md border hover:bg-red-300/[.6] transition-all text-black bg-white bg-opacity-50 z-10">
                        Clear
                    </button>
                    <button type="submit" name="submit" onclick="updateAlert()" class="text-black rounded-md px-6 py-4 border hover:bg-secondary/[.6] transition-all w-full  bg-white bg-opacity-50 z-10">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>