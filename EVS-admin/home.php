<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting System</title>
    <link rel = "icon" href ="../images/Logo_E-Undi.png" type = "image/x-icon">
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
        <a  href="#"> <img style="width:auto; height: 50px; padding: 10px;" src="images/logout.png"> </a>
    -->
    <!--
        <p class="menu cta">Menu</p>
    -->
</header>

<div class="div1">
    <h1 class="title">Dashboard</h1>
    <div class="history">
        <a href="home-history.php">History</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>
                    <table>
                        <thead>
                        <tr class="trh">
                            <!--<th>Country</th>-->
                            <th>Voting Title</th>
                            <th>Status</th>
                            <th>Candidates</th>
                            <th>Result</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'php/session.php';
                        $query = "SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id WHERE positions.status = 'Ongoing' AND positions.created_by = '".$user['admin_id']."' GROUP BY positions.priority";
                        $result = mysqli_query($conn,$query)or die( mysqli_error($conn));
                        while($row = mysqli_fetch_array($result)){
                            $id = $row['id'];
                            $description = $row['description'];
                            echo "
                        <tr>
                          <td class='text-center' style='text-transform: uppercase;'>".$row['description']."</td>
                          <td class='text-center'>".$row['status']."</td>
                          <td>
                            <a href='view_candidate.php?id=".$row['position_id']."' target='_blank'> View </a>
                          </td>
                          <td>
                            <a href='view_result.php?id=".$row['position_id']."'>View</a>
                          </td>
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