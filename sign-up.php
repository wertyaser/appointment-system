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

            //INSERT NEW DATA TO TABLE THEN RE-ORDER ID
            $query = "insert into users (name, birthday, course, email, password) 
            values ('$fullname', '$bday', '$course', '$email', '$password');";
            // $query .= "SET @num := 0;
            //  UPDATE users
            //  SET student_id = @num := @num + 1
            //  ORDER BY student_id;";
            $result = mysqli_query($conn, $query);
            if ($result) {
                header("Location: index.php");
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
    <link rel="stylesheet" href="./css/output.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <title>Sign Up</title>
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
                        <h1 class="mb-2 font-bold text-2xl text-left">Sign Up</h1>
                        <p class="mb-4 text-black text-xs text-left">Create your account to access essential academic details and stay informed.</p>
                        <input type="text" name="fname" placeholder="First name" required autocapitalize="on" class="border border-neutral-300 rounded-md text-black mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50">
                        <input type="text" name="lname" placeholder="Last name" required autocapitalize="on" class="border border-neutral-300 rounded-md text-black mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50">
                        <input type="text" name="email" placeholder="Email" required class="border border-neutral-300 rounded-md text-black mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50">
                        <input type="text" name="course" placeholder="Course" required autocapitalize="on" class="border border-neutral-300 rounded-md text-black mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50">
                        <input type="password" name="password" placeholder="Password" required class="border border-neutral-300 rounded-md text-black mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50">
                        <div class="w-full">
                            <span class="text-xs">Birthday</span>
                            <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>" class="border border-neutral-300 rounded-md text-neutral-700 mb-2 px-4 py-2 block w-full justify-center bg-white bg-opacity-50"/>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" onClick="handleClearFields()" class="px-4 py-2 rounded-md border hover:bg-red-300/[.6] transition-all text-black bg-white bg-opacity-50 z-10">
                                Clear
                            </button>
                            <button type="submit" name="submit" onClick="registerAlert()" class="text-black rounded-md px-4 py-2 border hover:bg-secondary/[.6] transition-all w-full  bg-white bg-opacity-50 z-10">
                                Create Account
                            </button>
                        </div>
                        <p class="text-black text-md text-center mt-4">Already have an account? <a class="text-black underline hover:underline-offset-4 z-10" href="./index.php">Login</a></p>
                    </form>
                </div>
            </div>
    </div>
</body>

</html>