<?php
include 'php/dbconn.php';
include 'php/session.php';
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting System</title>
    <link rel="icon" href="../images/Logo_E-Undi.png" type="image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bonos-voter.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <p class="logo">EVS</p>
        <nav>
            <ul class="nav__links">
                <li><a href="home.php">Election</a></li>
                <!-- <li><a href="nomination.php">Nomination</a></li> -->
            </ul>
        </nav>
        <a class="cta" href="logout.php">Logout</a>

    </header>
    <?php

    $userid = $_GET['id'];

    $sql = "SELECT *,candidates.firstname AS canfirst, candidates.lastname AS canlast FROM votes LEFT JOIN candidates ON candidates.id=votes.candidate_id LEFT JOIN positions ON positions.id=votes.position_id WHERE positions.id='$userid'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    if ($result->num_rows > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
            $fname = $row['firstname'];
            $lname = $row['lastname'];
            $dsc = $row['description'];
            echo "
            <div style='width:50%;margin-top:40px;margin-left:auto;margin-right:auto;text-align:center;border:2px solid black;border-radius:10px;background-color:#24252a;color:white;'>                                
               
                <span style='font-size:30px;' class='col-sm-8'><b>" . $dsc . ":</b></span></br></br></br>   
                <span style=''> <img src='" . $image . "' width='100' height='100'> </span>
                <span style='font-size: 30px;' class='col-sm-8'><b>" . $fname . ' ' . $lname . "</b></span>

                <div style='text-align:center;margin-top:50px;'>
                    <h3>You have already voted for this election.</h3>
                </div>
            </div>
            ";
        }
    } else {
    ?>
        <!-- Voting Ballot -->
        <form method="POST" id="ballotForm" action="submit_voting.php" style='width:50%;margin-top:40px;margin-left:auto;margin-right:auto;text-align:center;border:2px solid black;border-radius:10px;background-color:#24252a;color:white;'>
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

                    $input = ($row['max_vote'] > 1) ? '<input type="checkbox" class="flat-red" name="' . $row['description'] . '" value="' . $crow['id'] . '" checked="' . $checked . '">' : '<input type="radio" class="" name="' . $row['description'] . '" value="' . $crow['id'] . '" checked="' . $checked . '">';
                    $image = (!empty($crow['photo'])) ? '../images/' . $crow['photo'] : 'images/profile.jpg';
                    $candidate .= '
                    <li>
                        ' . $input . '
                        <img src="' . $image . '" height="70px" width="70px" class="clist">
                        <span style="padding-left: 10px; font-size: 20px;" class="cname clist">' . $crow['firstname'] . ' ' . $crow['lastname'] . '</span>
                    </li>';
                }

                $instruct = ($row['max_vote'] > 1) ? 'You may select up to ' . $row['max_vote'] . ' candidates' : 'Select only one candidate';

                echo '
          
                        <div id="' . $row['id'] . '">

                            <div>
                                <h3>
                                    <b>' . $row['description'] . '</b>
                                </h3>
                            </div>

                            <div>
                                <div>
                                    <ul style="
                                        text-align: left;">
                                        ' . $candidate . '
                                    </ul>
                                </div>
                            </div>

                        </div>      
            ';

                $candidate = '';
            }

            ?>
            <div style="
                margin-top: 30px;
                margin-bottom: 30px;
                margin-left: auto;
                margin-right: auto;
                text-align: left;">

                <p style="color: red;">
                    <b> Election Instructions </b>
                </p>
                <p>
                    1. Please read the manifesto first before proceed with the voting <br>
                    2. Please vote and choose the candidate(s) you agree to vote before click the submit button <br>
                    3. Any change of candidate will not be accepted by the committee <br>
                </p>
            </div>
            <div>
                <button class="submitForm" type="submit" name="vote" style="
                    width: 25%;
                    font-size: 20px;
                    font-weight: bold;
                    color: white;                    
                    padding: 15px;
                    background-color: rgba(0, 136, 169, 1);
                    border: none;
                    border-radius: 50px;
                    cursor: pointer;">Submit</button>
            </div>
        </form>
        <!-- End Voting Ballot -->

    <?php
    }

    ?>
</body>

</html>