<?php
    session_start();
    include 'php/dbconn.php';

    if(isset($_POST['login'])){
        // get the form's data
        $admin = ($_POST['admin']);
        $password = $_POST['password'];     
        $status = "Verified";

        // sql to select user's row to check existence
        $sql = "SELECT * FROM admin WHERE admin_id = '$admin' AND status = '$status'";
        // run the query
        $query = $conn->query($sql);

        // user not found
        if($query->num_rows < 1){
            $_SESSION['error'] = 'Incorrect credentials or account not Verify yet.';
            echo 'Incorrect credentials or account not Verify yet.';
        } 
        // user found
        else{
            // select user's row
            $row = $query->fetch_assoc();
            // verifying password
            if(password_verify($password, $row['password'])){
                $_SESSION['admin'] = $row['id'];
            }
            // password mismatch
            else{
                $_SESSION['error'] = 'Incorrect password';             
            }
        }
    }
    // empty input
    else{
        $_SESSION['error'] = 'Input voter credentials first';
    }

    // redirect to homepage
    header('location: home.html');
    exit();
?>