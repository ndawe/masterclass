<?php
session_start();
if(!isset($_SESSION['user']))
{
    header("location:login.php");
    exit();
}
else
{
    require_once('connect.php');
    // clear table
    echo "clearing masses in hypatia_masses table<br/>\r\n";
    $mysqli->query("truncate hypatia_masses");
    $mysqli->close();
    // remove uploaded files
    $files = glob('uploads/*');
    foreach($files as $file){
        if(is_file($file))
        {
            echo "deleting file " . $file . "<br/>\r\n";
            unlink($file);
        }
    }
    header("refresh:2;url=admin.php");
}
?>
