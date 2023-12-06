<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'lobot';

$conn = new mysqli($server, $username, $password, $dbname);

if (!$conn) {
    echo "Connection failed!";
}
