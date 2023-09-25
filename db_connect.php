<?php
$server = 'localhost';
$username = 'root';
$password = 'cose1234';
$dbname = 'student_db';

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    echo "Connection failed!";
}
