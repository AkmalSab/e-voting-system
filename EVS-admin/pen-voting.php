<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting System</title>
    <link rel = "icon" href ="../image/Logo%20E-Undi.png" type = "image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bonos-admin.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <!--<a class="logo" href="home.html"><img style="width: 150px; height: 50px;" src="../image/Logo%20E-Undi.png" alt="logo"></a>-->
    <p class="logo">EVS</p>
    <nav>
        <ul class="nav__links">
            <li><a href="home.php">Dashboard</a></li>
            <li><a href="#">Statistic</a></li>
            <li><a href="votes.php">Votes</a></li>
            <li><a href="voters.php">Voters</a></li>
            <li><a href="position.php">Position</a></li>
            <li><a href="candidate.php">Candidate</a></li>
        </ul>
    </nav>
    <a class="cta" href="logout.php">Logout</a>
    <!--
        <p class="menu cta">Menu</p>
    -->
</header>

<div class="div1">
    <h1 class="title">Pending Votes</h1>
    <div class="history">
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>
                    <table>
                        <thead>
                        <tr class="trh">
                            <!--<th>Country</th>-->
                            <th>NRIC</th>
                            <th>Name</th>
                            <th>Election</th>
                            <th>Voting Status</th>
                            <th>Tools</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'php/dbconn.php';
                        $sql2 = "SELECT * FROM admin";
                        $vquery = $conn->query($sql2);
                        $user = $vquery->fetch_assoc();
                        $sql = "SELECT *,voters.id, voters.voters_id, voters.firstname,positions.description FROM voters LEFT JOIN enroll ON voters.id=enroll.voters_id LEFT JOIN positions ON enroll.position_id=positions.id WHERE enroll.status = 'Enrolled'";
                        /*SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id where position_id IN (select position_id FROM candidates where candidate_id = '".$voter['voters_id']."') GROUP BY positions.id*/
                        /*SELECT *, voters.firstname AS votfirst, voters.lastname AS votlast FROM votes LEFT JOIN voters ON voters.id=votes.voters_id WHERE votes.voters_id != voters.voters_id AND voters.status = 'VERIFIED'*/
                        $query = $conn->query($sql) or die($conn->error);
                        while($row = $query->fetch_assoc()){
                            echo "
                        <tr>
                          <td>********".$row['voters_id']."</td>
                          <td>".$row['firstname']."</td>
                          <td>".$row['description']."</td>
                          <td>PENDING VOTING</td>
                          <td><button class='btn btn-warning btn-sm notify btn-flat' data-id='".$row['id']."'><i class='fa fa-bell'></i> Notify</button></td>
                        </tr>
                      ";
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