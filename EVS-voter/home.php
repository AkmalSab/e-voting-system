<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting System</title>
    <link rel = "icon" href ="../image/Logo%20E-Undi.png" type = "image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bonos-voter.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <!--<a class="logo" href="home.html"><img style="width: 150px; height: 50px;" src="../image/Logo%20E-Undi.png" alt="logo"></a>-->
    <p class="logo">EVS</p>
    <nav>
        <ul class="nav__links">
            <li><a href="home.php">Election</a></li>
            <li><a href="nomination.php">Nomination</a></li>
        </ul>
    </nav>
    <a class="cta" href="logout.php">Logout</a>
    <!--
        <p class="menu cta">Menu</p>
    -->
</header>

<div class="div1">
    <h1 class="title">Election</h1>
    <div class="history">
        <a href="#">Enroll Election</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>
                    <table>
                        <thead>
                        <tr class="trh">
                            <!--<th>Country</th>-->
                            <th>Election Title</th>
                            <th>Election Start</th>
                            <th>Election End</th>
                            <th>Candidates</th>
                            <th>Result</th>
                            <th>Voting</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'php/dbconn.php';
                        $sql2 = "SELECT * FROM voters";
                        $vquery = $conn->query($sql2);
                        $voter = $vquery->fetch_assoc();
                        $query = "SELECT *, positions.status AS stat, positions.id AS id FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id LEFT JOIN enroll ON enroll.position_id=positions.id where enroll.voters_id ='".$voter['id']."' GROUP BY positions.id";
                        /*                                $query = "SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id where position_id IN (select voters_id FROM enroll where voters_id = '".$voter['id']."') GROUP BY positions.id";*/
                        $result = mysqli_query($conn,$query)or die( mysqli_error($conn));
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $description = $row['description'];
                            if ($row['stat'] == 'Ongoing'){
                                echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['description']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['startdate']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['enddate']."</td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                        </tr>
                      ";}
                            elseif ($row['stat'] == 'Pending'){
                                echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['description']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['startdate']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['enddate']."</td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                          <td>
                            <a href='#'> View </a>
                          </td>
                        </tr>
                      ";
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div><!--end of .table-responsive-->
            </div>
        </div>
    </div>

</div>
</div>
</div>
<!--<div id="mobile__menu" class="overlay">
    <a class="close">&times;</a>
    <div class="overlay__content">
        <a href="#">Dashboard</a>
        <a href="#">Statistic</a>
        <a href="#">Votes</a>
        <a href="#">Voters</a>
        <a href="#">Position</a>
        <a href="#">Candidate</a>
    </div>
</div>-->
<!--
<script type="text/javascript" src="mobile.js"></script>
-->
</body>

</html>