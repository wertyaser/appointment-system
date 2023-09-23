<?php
include 'db_connect.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM users WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: admin.php?success=User has been delete successfully");
        exit();
    } else {
        header("Location: admin.php?error=Unknown error has occured");
        exit();
    }
}
