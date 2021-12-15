<?php
// include 'php/session.php';

include 'php/dbconn.php';

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
        // $_SESSION['error'] = 'User already exist';
    } else {
        // get today's date
        $date = date('Y-m-d');
        // set initial status
        $status = "Verified";
        // hash password
        $passwordhashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // insert query
        $sql = "INSERT INTO `voters` (`voters_id`, `password`, `firstname`, `lastname`, `photo`, `status`, `phone`, `created_on`, `logintime`) VALUES
        ('$voter_id', '$passwordhashed', '$firstname', '$lastname', '$filename', '$status', '$phone', '$date', '00:00:00');";

        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Registration success';
            // redirect to register
            header('location: index.php');
            exit();
        } else {
            // echo $conn->error;
            // redirect to register
            $_SESSION['error'] = 'Register Fail';
            header('location: register.php');
            exit();
        }
    }
} else {
    // redirect to register
    header('location: register.php');
    exit();
}
