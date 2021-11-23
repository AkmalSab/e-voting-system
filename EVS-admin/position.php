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
    <h1 class="title">Position</h1>
    <div class="history">
        <a href="#">New</a>
        <a href="pos-history.php">History</a>
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>
                    <table>
                        <thead>
                        <tr class="trh">
                            <!--<th>Country</th>-->
                            <th>Join Code</th>
                            <th>Description</th>
                            <th>Maximum Vote</th>
                            <th>Status</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include 'php/dbconn.php';
                        $sql2 = "SELECT * FROM admin";
                        $vquery = $conn->query($sql2);
                        $user = $vquery->fetch_assoc();
                        $sql = "SELECT * FROM positions WHERE created_by = '".$user['admin_id']."' AND status != 'Finish' AND status != 'Cancelled' ORDER BY priority ASC";
                        $query = $conn->query($sql);
                        while($row = $query->fetch_assoc()){
                            echo "
                        <tr>
                          <td>".$row['u_id']."</td>
                          <td>".$row['description']."</td>
                          <td>".$row['max_vote']."</td>
                          <td>".$row['status']."</td>
                          ";
                            if ($row['status'] == 'Pending'){
                                echo "
                          <td>
                            <button class='btn btn-primary btn-sm pending btn-flat' data-id='".$row['id']."'><i class='fa fa-hourglass-start'></i> Start Vote</button>                         
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['id']."'><i class='fa fa-times'></i> Cancel</button>
                          </td>
                        </tr>
                      ";
                            }
                            elseif ($row['status'] == 'Ongoing'){
                                echo "
                          <td>
                            <button class='btn btn-warning btn-sm status btn-flat'  data-id='".$row['id']."'><i class='fa fa-hourglass-end'></i> End Vote</button>                         
                            <button class='btn btn-success btn-sm edit btn-flat' disabled data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                            <button class='btn btn-danger btn-sm delete btn-flat' disabled data-id='".$row['id']."'><i class='fa fa-times'></i> Cancel</button>
                          </td>
                        </tr>  
                      ";
                            }
                            /*elseif ($row['status'] == 'Finish'){
                                echo "
                                <td>
                                  <button class='btn btn-warning btn-sm status btn-flat' disabled data-id='".$row['id']."'><i class='fa fa-hourglass-end'></i> End Vote</button>
                                  <button class='btn btn-success btn-sm edit btn-flat' disabled data-id='".$row['id']."'><i class='fa fa-edit'></i> Edit</button>
                                  <button class='btn btn-danger btn-sm delete btn-flat' disabled data-id='".$row['id']."'><i class='fa fa-trash'></i> Delete</button>
                                </td>
                              </tr>
                            ";
                            }*/
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