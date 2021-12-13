<?php
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <p class="logo">EVS</p>
        <nav>
            <ul class="nav__links">
                <li><a href="home.php">Election</a></li>
                <li><a href="nomination.php">Nomination</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php">Logout</a>
    </header>

    <div class="div1">
        <?php
        $vquery = "SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id WHERE positions.id='" . $_GET['id'] . "'";
        $vresult = mysqli_query($conn, $vquery) or die(mysqli_error($conn));
        if ($vrow = mysqli_fetch_array($vresult)) {
            $description = $vrow['description'];
            echo"<h1 class='title'> " . $description . "</h1>";
        }
        ?>        <!--<div class="history">
            <a href="#">Enroll Election</a>
        </div>-->

        <div class="container">
            <div class="row">
                <div class="cs-12">

                    <div>
                        <table>
                            <thead>
                                <tr class="trh">
                                    <!--<th>Country</th>-->
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Manifesto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM candidates LEFT JOIN positions ON positions.id=candidates.position_id WHERE positions.id='" . $_GET['id'] . "'";
                                $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

                                while ($row = mysqli_fetch_array($result)) {
                                    $image = (!empty($row['photo'])) ? '../images/' . $row['photo'] : '../images/profile.jpg';
                                    $fname = $row['firstname'];
                                    $lname = $row['lastname'];
                                    $platform = $row['platform'];
                                    echo "<tr>";
                                    echo "<td class='center-block'><img src='" . $image . "' width='80px' height='80px'></td>";
                                    echo "<td class='text-center' style='font-size: 18px;'> " . $fname . ' ' . $lname . "</td>";
                                    echo "<td style='font-size: 18px;'>" . $platform . "</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--end of .table-responsive-->
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
</body>

</html>