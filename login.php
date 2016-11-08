<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="layout.css">
</head>
<body>
<div id="wrapper" style="text-align:center;">
<?php
if (array_key_exists('msg', $_GET)) {
    $msg = $_GET['msg'];  //GET the message
    if($msg!='') echo '<p>'.$msg.'</p>'; //If message is set echo it
}
?>
<form name="login" id="login" method="POST" action="check_login.php">
<p><input type="password" size="20" name="password" id="password" class="password" placeholder="Password"/></p>
<p><input type="submit" name="login" id="submit" value="Login" class="button"/></p>
</form>
<p><a href="index.php">Home</a></p>
</div>
</body>
</html>
