<?php

    include 'php/dbconn.php';

    if(isset($_POST['login'])){
        // get the form's data
        $admin = ($_POST['admin']);
        $password = $_POST['password'];     
        $status = "Verified";

        // check if data is empty
        if(empty($admin) || empty($password)){
            header('location: index.php?error=null');
            exit();
        }

        // sql to select user's row to check existence
        $sql = "SELECT * FROM admin WHERE admin_id = '$admin' AND status = '$status'";
        // run the query
        $query = $conn->query($sql);

        // user not found
        if($query->num_rows < 1){
            // $_SESSION['error'] = 'Incorrect credentials or account not Verify yet.';
            // echo 'Incorrect credentials or account not Verify yet.';
            header('location: index.php?error=notfound');
            exit();
        } 
        // user found
        else{
            // select user's row
            $row = $query->fetch_assoc();
            // verifying password
            if(password_verify($password, $row['password'])){
                session_start();
                $_SESSION['admin'] = $row['id'];
                header('location: home.php');
                exit();
            }
            // password mismatch
            else{
                header('location: index.php?error=mismatch');
                exit();        
            }
        }
    }    
    else{
        // empty input
        header('location: index.php?error=null');
        exit(); 
    }
?>