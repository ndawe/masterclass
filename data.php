<?php
// Open connection
require_once('connect.php');

function query($expr)
{
    global $mysqli;
    $arr = Array();
    if ($stmt = $mysqli->prepare($expr)) {
        $stmt->bind_result($name);
        $OK = $stmt->execute();
        if ($OK) {
            while($stmt->fetch()) {
                $arr[] = $name;
            }
        }
    }
    return $arr;
}

// Put all of the resulting names into a PHP array
$masses      = query("SELECT `mass` FROM hypatia_masses");
$masses_2e   = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='e'");
$masses_2m   = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='m'");
$masses_4e   = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='4ee'");
$masses_4m   = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='4mm'");
$masses_2m2e = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='4me'");
$masses_ph   = query("SELECT `mass` FROM hypatia_masses WHERE `channel`='g'");

// Close the connection
$mysqli->close();
?>
