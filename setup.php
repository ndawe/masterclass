<?php
require_once('connect.php');

function create_user($username, $password)
{
    global $mysqli;
    $escapedName = mysqli_real_escape_string($mysqli, stripslashes($username));
    $escapedPW = mysqli_real_escape_string($mysqli, stripslashes($password));
    $hashedPW = password_hash($escapedPW, PASSWORD_BCRYPT);
    $query = "insert into users (username, password) values ('$escapedName', '$hashedPW')";
    if ($mysqli->query($query)) {
        echo "created user " . $username . "<br/>\r\n";
    }
    else
    {
        echo "failed to create user " . $username . "<br/>\r\n";
    }
}

// Create tables
if ($mysqli->query("SHOW TABLES LIKE 'hypatia_masses'")->num_rows == 0)
{
    // Create hypatia_masses table
    $mysqli->query("create table hypatia_masses (mass DOUBLE, channel VARCHAR(5))");
}
else
{
    echo "table hypatia_masses already exists<br/>\r\n";
}

if ($mysqli->query("SHOW TABLES LIKE 'users'")->num_rows == 0)
{
    // Create users table
    $mysqli->query("create table users (username VARCHAR(20) NOT NULL UNIQUE, password CHAR(60) BINARY)");
}
else
{
    echo "table users already exists<br/>\r\n";
}

// Create users
create_user('student', $studentpw);
create_user('admin', $adminpw);
?>
