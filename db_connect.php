<?php
$server = 'localhost';
$username = 'root';
$password = 'cose123';
$dbname = 'student_db';

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    echo "Connection failed!";
}
