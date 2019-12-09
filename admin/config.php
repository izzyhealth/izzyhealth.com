<?php
$mysqli = new mysqli("208.91.198.197:3306","neerusanju","neerusanju@226021","neerukxg_neerusanju");
if ($mysqli->connect_errno) {
    echo "Sorry, this website is experiencing problems.";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
}
?>