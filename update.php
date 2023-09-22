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
    <link rel="stylesheet" href="./css/update.css">
    <title>Update</title>
</head>

<body>
    <div class="container">
        <form method="post">
            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>
            <input type="text" id="name" name="name" value="<?php echo $name ?>" required>
            <input type="date" id="birthday" name="birthday" value="<?php echo $birthday ?>">
            <input type="text" id="course" name="course" value="<?php echo $course ?>">
            <input type="email" id="email" name="email" value="<?php echo $email ?>" required>
            <input type="password" id="password" name="password" value="<?php echo $password ?>" required>
            <button type="submit" name="submit" onclick="myAlert();">Update</button>

        </form>
    </div>
    <script>
        function myAlert() {
            alert("Updated Successfully");
        }
    </script>
</body>

</html>