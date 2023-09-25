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

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users set student_id='$id', name='$name', birthday ='$birthday', course='$course', email='$email', password='$password' WHERE student_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: my-account.php');
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
</head>

<body class="min-h-screen bg-blue py-16 relative">
    <main class="container mx-auto ma-w-7xl w-11/12">
        <button onClick="handleBackButton()" type="button"
            class="flex items-center gap-2 border border-white mb-16 rounded-md hover:bg-white/[.5] transition-all px-6 py-3">
            <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-undo-2">
                <path d="M9 14 4 9l5-5" />
                <path d="M4 9h10.5a5.5 5.5 0 0 1 5.5 5.5v0a5.5 5.5 0 0 1-5.5 5.5H11" />
            </svg> <span class="text-white">Back</span></button>
        <h1 class="text-left font-display text-7xl mb-14 text-pink">Edit Information: </h1>
        <form method="post" class="max-w-2xl mx-auto w-full mt-12">
            <?php if (isset($_GET['success'])) { ?>
                <p class="success">
                    <?php echo $_GET['success']; ?>
                </p>
            <?php } ?>
            <input type="text" id="name" name="name" value="<?php echo $name ?>" required
                class="border border-white rounded-md text-white mb-3 min-w-0 bg-blue px-6 py-4 block w-full">
            <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>"
                class="border border-white rounded-md text-white mb-3 min-w-0 bg-blue px-6 py-4 block w-full">
            <input type="text" id="course" name="course" value="<?php echo $course ?>"
                class="border border-white rounded-md text-white mb-3 min-w-0 bg-blue px-6 py-4 block w-full">
            <input type="email" id="email" name="email" value="<?php echo $email ?>" required
                class="border border-white rounded-md text-white mb-3 min-w-0 bg-blue px-6 py-4 block w-full">
            <input type="password" id="password" name="password" value="<?php echo $password ?>" required
                class="border border-white rounded-md text-white mb-3 min-w-0 bg-blue px-6 py-4 block w-full">
            <button type="submit" name="submit" onclick="myAlert();"
                class="bg-pink text-white rounded-md px-6 py-4 border border-white w-full hover:bg-pink-violet transition-all">Update</button>

        </form>
    </main>
    <script src="./js/functions.js"></script>
</body>

</html>