<?php
include 'includes/session.php';

if(isset($_POST['pending'])){
    $id = $_POST['id'];
    $date = $_POST['date'];
    $findate = date("Y-m-d H:i:s",strtotime($date));

    $sql = "SELECT * FROM positions WHERE id = $id";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    $description = $row['description'];
    $created = $user['admin_id'];
    $fname = $user['firstname'];
    $stats = "start election name";
    $catg = "Admin";
    $logdate = date('Y/m/d H:i:s');

    /*    $date = date('YYYY-MM-DD HH:MM:SS');*/
    $status = "Ongoing";
    $sql = "UPDATE positions SET status = '$status', startdate = CURRENT_TIMESTAMP, enddate = '$findate' WHERE id = '$id'";
    /*    $sql = "UPDATE admin SET status = '$status' AND created_on = '$date' WHERE id = '$id'";*/

    if($conn->query($sql)){
        $_SESSION['success'] = 'Voting session has start!';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }
    $sql2 = "INSERT INTO logfile (date, firstname, nric, status, description, category) VALUES ('$logdate','$fname','$created','$stats','$description','$catg')";
    $query = $conn->query($sql2);
}
else{
    $_SESSION['error'] = 'Error starting the voting session';
}

header('location: positions.php');

?>