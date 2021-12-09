<?php
    $conn = new mysqli("localhost", "root", "123456789", "e-voting");

    if ($conn->connect_error) 
        die("Connection failed: " . $conn->connect_error);
?>