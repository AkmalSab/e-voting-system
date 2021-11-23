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
    <h1 class="title">Nominated Election</h1>
    <div class="history">
        <a href="nominate.php">Nominate Yourself</a>
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
                            <th>Status</th>
                            <th>Candidates</th>
                            <th>Result</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'php/dbconn.php';
                        $sql2 = "SELECT * FROM voters";
                        $vquery = $conn->query($sql2);
                        $voter = $vquery->fetch_assoc();
                        $query = "SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id where position_id IN (select position_id FROM candidates where candidate_id = '".$voter['voters_id']."') GROUP BY positions.id";
                        $result = mysqli_query($conn,$query)  or die( mysqli_error($conn));
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $description = $row['description'];
                            if ($row['status'] == 'Ongoing'){
                                echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['description']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['status']."</td>
                          <td>
                          <a style='border-radius: 15px;' class='btn btn-info btn-sm btn-flat btn-block userinfo' data-id='".$id."'><i class='fa fa-search'></i> View</a>
                          </td>
                          <td>
                          <a style='border-radius: 15px;' class='btn btn-info btn-sm btn-flat btn-block userresult' data-id='".$id."'><i class='fa fa-search'></i> View</a>
                          </td>
                        </tr>
                      ";}
                            elseif ($row['status'] == 'Finish'){
                                echo "
                        <tr>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['description']."</td>
                          <td style='text-transform: uppercase; padding-left: 100px;'>".$row['status']."</td>
                          <td>
                          <a style='border-radius: 15px;' class='btn btn-warning btn-sm btn-flat btn-block userinfo' data-id='".$id."'><i class='fa fa-search'></i> View</a>
                          </td>
                          <td>
                          <a style='border-radius: 15px;' class='btn btn-warning btn-sm btn-flat btn-block userresult' data-id='".$id."'><i class='fa fa-search'></i> View</a>
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