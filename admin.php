<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location:login.php"); // Please login
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Administrator's Controls</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="wrapper" style="text-align:center;">
    <h1>Administrator's Controls</h1>
    <p><a href="reset.php">Reset Everything</a></p>
    <p><a href="refill.php">Reimport Masses</a></p>
    <p><a href="index.php">Home</a></p>
    <p><a href="logout.php">Logout</a></p>
</div>
</body>
</html>
