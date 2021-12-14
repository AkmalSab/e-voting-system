<?php

include 'php/dbconn.php';
include 'php/session.php';

// remove all session variables
session_unset();

// destroy the session
session_destroy();

//redirect user back to login page
header('location: index.php');
