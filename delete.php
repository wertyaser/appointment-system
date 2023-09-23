<?php
include 'db_connect.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];

    $sql = "DELETE FROM users WHERE student_id = $id;";
    $sql .= "SET @num := 0;
            UPDATE users
            SET student_id = @num := @num + 1
            ORDER BY student_id;";

    $result = mysqli_multi_query($conn, $sql);
    if ($result) {

        header("Location: admin.php?success=User has been delete successfully");
        exit();
    } else {
        // header("Location: delete.php?error=Unknown error has occured");
        exit();
    }
}
