<?php
include 'includes/session.php';

if(isset($_POST['status'])){
    $id = $_POST['id'];

    $sql = "SELECT * FROM positions WHERE id = $id";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $description = $row['description'];
    $created = $user['admin_id'];
    $fname = $user['firstname'];
    $stats = "end election name";
    $catg = "Admin";
    $logdate = date('Y/m/d H:i:s');

/*    $date = date('YYYY-MM-DD HH:MM:SS');*/
    $status = "Finish";
    $sql = "UPDATE positions SET status = '$status' WHERE id = '$id'";
    /*    $sql = "UPDATE admin SET status = '$status' AND created_on = '$date' WHERE id = '$id'";*/

    if($conn->query($sql)){
        $_SESSION['success'] = 'Voting session has end!';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
    $sql2 = "INSERT INTO logfile (date, firstname, nric, status, description, category) VALUES ('$logdate','$fname','$created','$stats','$description','$catg')";
    $query = $conn->query($sql2);
}
else{
    $_SESSION['error'] = 'Error ending the voting session';
}

header('location: positions.php');

?>