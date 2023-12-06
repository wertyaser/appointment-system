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
            values ('$fullname', '$bday', '$course', '$email', '$password');";
            
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
    <script src="./js/functions.js" defer></script>

</head>

<body>
    <div class="backgroundImage min-h-screen bg-cover bg-center isolation relative flex justify-center items-center" style="background-image: url('images/auth-bg.jpg');">
            <div class="parentDiv mx-auto bg-bckgrd bg-opacity-75 rounded-xl shadow-lg p-12 grid grid-rows-9 grid-flow-col gap-4 w-9/12">
                <div class="logoDiv row-start-2 col-span-1">
                    <img src="./images/Logo.png" class="mx-auto w-[120px]">
                    <h1 class="font-bold text-2xl text-center text-black mt-4">School Management System</h1>
                    <p class="font-light text-xs text-center mt-3">Empowering students through accessible appointments.</p>
                </div>
                <div class="fieldDiv row-span-4">
                    <form method="post" class="m-auto">
                    <h1 class="mb-4 text- font-bold text-3xl text-left">Sign Up</h1>
                    <p class="mb-6 text-black text-xs text-left">Create your account to access essential academic details and stay informed.</p>
                    <input type="text" name="fname" placeholder="First name" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full">
                    <input type="text" name="lname" placeholder="Last name" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full">
                    <input type="text" name="email" placeholder="Email" required class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full">
                    <input type="text" name="course" placeholder="Course" required autocapitalize="on" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full">
                    <input type="password" name="password" placeholder="Password" required class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full">
                    <div class="w-full">
                        <span>Birthday</span>
                        <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>" class="border border-black rounded-md text-black mb-3 px-4 py-2 w-full justify-center bg-white bg-opacity-50"/>
                    </div>
                    <!-- <input type="date" id="date" name="bday" class="mb-2 block bg-blue border border-white px-4 py-2 rounded-lg text-black w-full"> -->

                    <div class="flex items-center gap-2 mb-2 flex-wrap">
                        <button type="button" onClick="handleClearFields()" class="py-2 rounded-md border border-white hover:bg-white/[.5] transition-all text-black w-full">Clear</button>
                        <button type="submit" name="submit" onClick="registerAlert()" class="bg-pink text-black rounded-lg py-2 text-sm w-full">Create
                            Account</button>

                    </div>
                    <p class="text-black underline underline-offset-8">Already have an account?<a href="./index.php"> Login</a></p>
            </form>
                </div>
            </div>
    </div>
</body>

</html>