<?php
$msg = '';
if(isset($_POST['login'])) {
    ob_start();
    require_once('connect.php');
    $result = $mysqli->query("SELECT `password` FROM users WHERE `username`='admin'");
    $row = $result->fetch_assoc();
    if($row){
        if (password_verify($_POST['password'], $row['password'])) {
            // Register $myusername, $mypassword and redirect to file "admin.php"
            session_start();
            $_SESSION['user'] = 'admin';
            header("location:admin.php");
        }
        else
        {
            $msg = "Wrong password. Please retry.";
            header("location:login.php?msg=$msg");
        }
    }
    else {
        $msg = "Wrong password. Please retry.";
        header("location:login.php?msg=$msg");
    }
    $mysqli->close();
    ob_end_flush();
}
else {
    header("location:login.php?msg=Please enter some username and password");
}
?>
