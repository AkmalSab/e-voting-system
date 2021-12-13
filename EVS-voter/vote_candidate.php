<?php
include 'php/dbconn.php';
include 'php/session.php';
$userid = $_GET['id'];

$sql = "SELECT *,candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE positions.id='$userid'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
        $fname = $row['firstname'];
        $lname = $row['lastname'];
        $dsc = $row['description'];
        echo "<div class='row votelist'>
                <span style='padding-left: 50px;' class='col-sm-4'> <img src='" . $image . "' width='100px' height='100px'> </span>
                <span style='padding-left: 70px; font-size: 30px;' class='col-sm-8'><b>" . $dsc . ":</b></span>
                <span style='padding-left: 70px; font-size: 30px;' class='col-sm-8'><b>" . $fname . ' ' . $lname . "</b></span>
            </div>";
    }
?>
    <div>
        <h3>You have already voted for this election.</h3>
    </div>
<?php
} else {
?>
    <!-- Voting Ballot -->
    <form method="POST" id="ballotForm" action="submit_voting.php">
        <?php
        $candidate = '';
        $status = "Ongoing";
        $sql = "SELECT * FROM positions WHERE status = '$status' AND positions.id='$userid'";
        $query = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        while ($row = mysqli_fetch_array($query)) {
            $sql = "SELECT * FROM candidates WHERE position_id='" . $row['id'] . "'";
            $cquery = $conn->query($sql);
            while ($crow = $cquery->fetch_assoc()) {
                $slug = $row['description'];
                $checked = '';
                
                if (isset($_SESSION['post'][$slug])) {
                    $value = $_SESSION['post'][$slug];


                    if (is_array($value)) {
                        foreach ($value as $val) {
                            if ($val == $crow['id']) {
                                $checked = 'checked';
                            }
                        }
                    } else {
                        if ($value == $crow['id']) {
                            $checked = 'checked';
                        }
                    }
                }

                $input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red" name="' . $row['description'] . '" value="' . $crow['id'] . '" checked="' . $checked . '">' : '<input type="radio" class="flat-red" name="' . $row['description'] . '" value="' . $crow['id'] . '" checked="' . $checked . '">';
                $image = (!empty($crow['photo'])) ? '../images/' . $crow['photo'] : 'images/profile.jpg';
                $candidate .= '
                <li xmlns="http://www.w3.org/1999/html">
                    ' . $input . '
                    <img src="' . $image . '" height="70px" width="70px" class="clist">
                    <span style="padding-left: 10px; font-size: 20px;" class="cname clist">' . $crow['firstname'] . ' ' . $crow['lastname'] . '</span>
                </li>
            ';
            }

            $instruct = ($row['max_vote'] > 1) ? 'You may select up to ' . $row['max_vote'] . ' candidates' : 'Select only one candidate';

            echo '
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-solid" id="' . $row['id'] . '">
                            <div class="box-header with-border">
                                <h3 class="box-title"><b>' . $row['description'] . '</b></h3>
                            </div>
                            <div class="box-body">

                                <div id="candidate_list">
                                    <ul>
                                        ' . $candidate . '
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ';

            $candidate = '';
        }

        ?>
        <div>
            <div>
                <p style="color: red;"><b> Election Instructions </b></p>
            </div>
            <p><b> 1. Please read the manifesto first before proceed with the voting </b></p>
            <p><b> 2. Please vote and choose the candidate(s) you agree to vote before click the submit button </b></p>
            <p><b> 3. Any change of candidate will not be accepted by the committee </b></p>
        </div>
        <div>
            <button style="padding: 14px 28px; width: 100%; font-size: 20px;" type="submit" class="btn btn-success btn-flat" name="vote">Submit</button>
        </div>
    </form>
    <!-- End Voting Ballot -->
   
<?php
}

?>