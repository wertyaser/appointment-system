<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'student_db';

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
