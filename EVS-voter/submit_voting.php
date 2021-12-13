<?php
include 'php/dbconn.php';
include 'php/session.php';
function slugify($string)
{
    $preps = array('in', 'at', 'on', 'by', 'into', 'off', 'onto', 'from', 'to', 'with', 'a', 'an', 'the', 'using', 'for');
    $pattern = '/\b(?:' . join('|', $preps) . ')\b/i';
    $string = preg_replace($pattern, '', $string);
    $string = preg_replace('~[^\\pL\d]+~u', '_', $string);
    $string = trim($string, '-');
    $string = iconv('utf-8', 'us-ascii//TRANSLIT', $string);
    // $string = strtoupper($string);
    $string = preg_replace('~[^-\w]+~', '', $string);

    return $string;
}

if (isset($_POST['vote'])) {

    if (count($_POST) == 1) {
        $_SESSION['error'][] = 'Please vote atleast one candidate';
        echo 'Please vote atleast one candidate';
    } else {
        $_SESSION['post'] = $_POST;
        $sql = "SELECT * FROM positions";
        $query = $conn->query($sql);
        $error = false;
        $sql_array = array();
        while ($row = $query->fetch_assoc()) {
            $position = slugify($row['description']);
            $pos_id = $row['id'];
            $votid = $voter['id'];

            if (isset($_POST[$position])) {
                if ($row['max_vote'] > 1) {
                    if (count($_POST[$position]) > $row['max_vote']) {
                        $error = true;
                        $_SESSION['error'][] = 'You can only choose ' . $row['max_vote'] . ' candidates for ' . $row['description'];
                    } else {
                        foreach ($_POST[$position] as $key => $values) {
                            /*$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['id']."', '$values', '$pos_id')";*/
                            $sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('" . $voter['id'] . "', '$values', '$pos_id')";
                            $sql2 = "UPDATE enroll SET status = 'Done' WHERE voters_id = '$votid' AND position_id= '$pos_id'";
                            $vquery = $conn->query($sql2);
                        }
                    }
                } else {
                    $candidate = $_POST[$position];
                    // echo $voter['id'].' '.$candidate.' '.$pos_id;
                    /*$sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('".$voter['id']."', '$candidate', '$pos_id')";*/
                    $sql_array[] = "INSERT INTO votes (voters_id, candidate_id, position_id) VALUES ('" . $voter['id'] . "', '$candidate', '$pos_id')";
                    $sql2 = "UPDATE enroll SET status = 'Done' WHERE voters_id = '$votid' AND position_id= '$pos_id'";
                    // $vquery = $conn->query($sql2);
                }
            }
        }

        if (!$error) {
            foreach ($sql_array as $sql_row) {
                $conn->query($sql_row);
            }
            $vquery = $conn->query($sql2);

            unset($_SESSION['post']);
            $_SESSION['success'] = 'Ballot Submitted Successfully!';
            echo 'Ballot Submitted Successfully!';
            header('location: home.php');
        } else {
            $_SESSION['error'] = 'Error on submitting the ballot';
            echo 'Error on submitting the ballot';
            header('location: home.php');
        }
    }
} else {
    $_SESSION['error'][] = 'Select candidates to vote first';
    echo 'Select candidates to vote first';
}

	// header('location: testmodal.php');
