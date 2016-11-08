<?php
require_once('config.php');
require_once('password.php');

// MySQL connection
$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    printf("MySQL connection failed: %s\n", $mysqli->connect_error);
    exit();
}
?>
