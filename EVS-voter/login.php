<?php
	include 'php/dbconn.php';

	if(isset($_POST['login'])){

        // get form's data
		$voter = $_POST['voter'];
		$password = $_POST['password'];
        $status = "Verified";

        // check if data is empty
        if(empty($voter) || empty($password)){
            header('location: index.php?error=null');
            exit();
        }
        
        // select user's row from db
        $sql = "SELECT * FROM voters WHERE voters_id = '$voter' AND status = '$status'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
            // user not found and redirect back to login page
            header('location: index.php?error=notfound');
            exit();
		}
		else{
			$row = $query->fetch_assoc();
			if(password_verify($password, $row['password'])){
                // store user's id in session
                session_start();
				$_SESSION['voter'] = $row['id'];                
			}
			else{
                header('location: index.php?error=mismatch');
                exit();
			}
		}
        // update last login time
        $sql2 = "UPDATE voters SET logintime = CURRENT_TIMESTAMP WHERE voters_id = '$voter'";
        // execute query
        $vquery = $conn->query($sql2);
        // redirect user to homepage
        header('location: home.html');
        exit();
	}
    else{        
        // redirect user back to login page
        header('location: index.php?error=null');
        exit();
    }
?>