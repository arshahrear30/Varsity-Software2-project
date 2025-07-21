<?php
$host = 'localhost';         // or your server IP
$user = 'zftsszne_shahrear';
$pass = 'arshahrear30@gmail.com';
$dbname = 'zftsszne_my_database';   // make sure this database exists

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
