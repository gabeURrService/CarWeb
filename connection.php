<?php
    $servername = "localhost"; // or 127.0.0.1
    $username = "root";
    $password = ""; // default password is empty
    $dbname = "database_1";
    $port = 3306; // Ensure this is the correct port number
    $conn = new mysqli($servername, $username, $password, $dbname, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "";
?>