<?php
include 'php/session.php';

if (isset($_POST['add'])) {
    // get the form's data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $voter_id = $_POST['voter_id'];
    $phone = $_POST['phone'];
    $filename = $_FILES['photo']['name'];

    echo $firstname . '</br>';
    echo $lastname . '</br>';
    echo $password . '</br>';
    echo $confirmpassword . '</br>';
    echo $voter_id . '</br>';
    echo $phone . '</br>';
    echo $filename . '</br>';

    if (!empty($filename)) {
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/' . $filename);
    }

    // sql to select user's row to check existence
    $sql2 = mysqli_query($conn, "SELECT voters_id from voters WHERE voters_id = '$voter_id' AND status='Not Verified'");

    if (mysqli_num_rows($sql2) == 1) {
        // User already exist
        echo 'User already exist';
        $_SESSION['error'] = 'User already exist';
    } else {
        // get today's date
        $date = date('Y-m-d');
        // set initial status
        $status = "Verified";
        // hash the password
        $passwordhashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // insert new user's row
        $sql = "INSERT INTO `voters` (`voters_id`, `password`, `firstname`, `lastname`, `photo`, `phone`, `created_on`, `status`) VALUES ('$voter_id', '$passwordhashed', '$firstname', '$lastname', '$filename', '$phone', '$date', '$status')";

        // run the query
        if ($conn->query($sql)) {
            echo 'register success';
            // redirect to homepage      
        } else {
            echo 'x ok';
            // display error
            $_SESSION['error'] = 'Register Fail';
        }
    }
} else {
    echo 'tiberr';
    // redirect to register
}
