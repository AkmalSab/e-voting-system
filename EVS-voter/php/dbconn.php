<?php
    $conn = new mysqli("localhost", "root", "", "e-voting");

    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);
?>