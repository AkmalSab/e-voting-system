<?php
session_start();
unset($_SESSION['error']);
include 'php/dbconn.php';

if(isset($_POST['add'])){
    // get the form's data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $admin = $_POST['admin_id'];
    $phone = $_POST['phone'];
    $filename = $_FILES['photo']['name'];
    
    if(!empty($filename)){
        move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);
    }

    // sql to select user's row to check existence
    $sql2 = mysqli_query($conn,"SELECT admin_id from admin WHERE admin_id = '$admin' AND status='Not Verified'");

    if (mysqli_num_rows($sql2)==1) {
        // User already exist
        $_SESSION['error'] = 'User already exist';
    }
    else {                        
        // get today's date
        $date = date('Y-m-d');
        // set initial status
        $status = "Verified";
        // hash the password
        $passwordhashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
        // insert new user's row
        $sql = "INSERT INTO `admin` (`admin_id`, `password`, `firstname`, `lastname`, `photo`, `phone`, `created_on`, `status`) VALUES ('$admin', '$passwordhashed', '$firstname', '$lastname', '$filename', '$phone', '$date', '$status')";

        // run the query
        if($conn->query($sql)){
            // redirect to homepage            
            header('location: index.php');
            exit();
        }
        else{
            // display error
            $_SESSION['error'] = 'Register Fail';
            header('location: register.php');
            exit();
        }        
    }
}
else{
    // redirect to register
    header('location: register.php');
    exit();
}    
?>