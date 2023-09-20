<?php
include './db_connect.php';
$id = $_GET['update_id'];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $birthday = $_POST['birthday'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "Update `users` set id=$id, name=$name, birthday=$birthday, course=$course, email=$email, password=$password where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header('Location: ./pages/my-account.php');
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
    <link rel="stylesheet" href="./pico-master/css/pico.min.css">
    <link rel="stylesheet" href="./css/update.css">
    <title>Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <input type="text" id="name" name="name" placeholder="Name" value="something" required disabled>
            <input type="date" id="birthday" name="birthday">
            <input type="text" id="course" name="course" placeholder="Course" value="something" required disabled>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" value="something" required disabled>
            <button type="submit">Edit</button>
            <button type="submit">Update</button>
        </form>
    </div>
</body>

</html>