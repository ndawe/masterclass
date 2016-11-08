<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location:login.php"); // Please login
    exit();
}
else
{
    require_once('connect.php');
    require_once('utils.php');
    // clear table
    echo "clearing masses in hypatia_masses table<br/>\r\n";
    $mysqli->query("truncate hypatia_masses");
    // refill from uploaded files
    $files = glob('uploads/*');
    foreach($files as $file){
        if(is_file($file)) {
            fill_masses($mysqli, $file);
            echo "reimported masses from " . $file . "<br/>\r\n";
        }
    }
    $mysqli->close();
    header("refresh:2;url=admin.php");
}
?>
