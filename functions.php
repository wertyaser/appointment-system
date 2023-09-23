<?php

function check_login($conn)
{
    if (isset($_SESSION['user_id'])) {
        $id = $_SESSION['user_id'];
        $query = "select * from users where email = '$id' limit 1";
        $result = mysqli_query($conn, $query);
        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    } else {
        header("Location: error-page.php");
    }
}


// function check_admin($conn)
// {
//     if (isset($_SESSION['user_id'])) {
//         $id = $_SESSION['user_id'];
//         $query = "SELECT * from admin where email = '$id' limit 1";
//         $result = mysqli_query($conn, $query);
//         if ($result && mysqli_num_rows($result) > 0) {
//             $user_data = mysqli_fetch_assoc($result);
//             return $user_data;
//         }
//     } else {
//         header("Location: error-page.php");
//     }
// }