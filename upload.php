<?php
require_once('connect.php');
require_once('utils.php');

if(isset($_POST["upload_masses"])) {

    $result = $mysqli->query("select `password` from users where `username`='student'");
    $row = $result->fetch_assoc();
    if ($row)
    {
        if (!password_verify($_POST["password"], $row['password']))
        {
            echo "incorrect password";
            header("refresh:3;url=index.php");
            $result->free();
            $mysqli->close();
            exit();
        }
        $result->free();
    }
    else
    {
        echo "user student does not exist";
        header("refresh:3;url=index.php");
        $mysqli->close();
        exit();
    }
    
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["filename"]["name"]);
    $filetype = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        header("refresh:3;url=index.php");
        $mysqli->close();
        exit();
    }

    // Check file size
    if ($_FILES["filename"]["size"] > 1000000) {
        echo "Sorry, your file is too large.";
        header("refresh:3;url=index.php");
        $mysqli->close();
        exit();
    }

    // Allow certain file formats
    if($filetype != "txt" && $filetype != "csv") {
        echo "Sorry, only .txt or .csv files are allowed.";
        header("refresh:3;url=index.php");
        $mysqli->close();
        exit();
    }

    if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
        fill_masses($mysqli, $target_file);
        echo "The file ". basename( $_FILES["filename"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
else
{
    print('form data not complete');
}

// Close connection
$mysqli->close();
header("refresh:3;url=index.php");
?>
