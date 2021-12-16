<?php
include 'php/session.php';
$userid = $_GET['id'];
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Voting System</title>
    <link rel="icon" href="../images/Logo_E-Undi.png" type="image/x-icon">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bonos-admin.css">
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

    <div class="div1">

        <h1 class="title">Election Result</h1>

        <div class="container">
            <div class="row">
                <div class="cs-12">
                    <div>
                        <?php
                        $sql = "SELECT * FROM positions WHERE positions.id=" . $userid . " ORDER BY priority ASC";
                        $query = $conn->query($sql);
                        while ($row = $query->fetch_assoc()) {
                            $id = $row['id'];
                            echo "  
                                    <table>
                                    <thead>
                                        <tr>
                                            <td class='trh text-center' colspan='2'><b>" . $row['description'] . "</b></td>
                                        </tr>
                                        <tr class='trh'>
                                            <th>Candidates</th>
                                            <th>Vote</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                
                                    ";

                            $sql = "SELECT * FROM candidates WHERE position_id = '$id' ORDER BY firstname ASC";
                            $cquery = $conn->query($sql);
                            while ($crow = $cquery->fetch_assoc()) {
                                $sql = "SELECT * FROM votes WHERE candidate_id = '" . $crow['id'] . "'";
                                $vquery = $conn->query($sql);
                                $votes = $vquery->num_rows;

                                echo "
                                        <tr>
                                            <td width='80%' >" . $crow['firstname'] . " " . $crow['lastname'] . "</td>
                                            <td width='50%' >" . $votes . "</td>
                                        </tr>
                                        ";
                            }
                        }
                        ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>