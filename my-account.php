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
    <link rel="stylesheet" href="../css/my-account.css">
    <link rel="stylesheet" href="pico-master/css/pico.min.css" />
    <title>My Account</title>
</head>

<body>
    <nav>
        <ul>
            <li>Logo</li>
        </ul>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="logout.php" role="button">Log out</a></li>
        </ul>
    </nav>
    <main>
        <div class="header">
            <h1>Hello, <?php echo $user_data['name']; ?></h1>
            <h4>Student details</h4>
        </div>
        <div class="container">
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
                    <h2 style="margin: 0;">Name: ' . $name . '</h2>
                    <h2 style="margin: 0;">Birthday: ' . $birthday . '</h2>
                    <h2 style="margin: 0;">Course: ' . $course . '</h2>
                    <h2 style="margin: 0;">Email: ' . $email . '</h2>
                    <h2 style="margin: 0;">Password: ' . $password . '</h2>
                    <br><br>
                    <a href=" update.php?update_id=' . $id . '" role="button" >Update</a>
                    </article>
                    ';
                }
            }
            ?>
        </div>
    </main>
</body>

</html>