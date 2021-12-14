<?php include 'php/session.php'; ?>
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
    <h1 class="title">Edit Position</h1>
    <div class="history">
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>

                    <?php
                    $candidate = array();
                    $query = "SELECT * FROM positions WHERE id='" . $_GET['id'] . "'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    while ($row = mysqli_fetch_array($result)) {
                        $candidate = $row;
                        /*                        print_r($candidate);*/
                    }
                    ?>

                    <form class="form-horizontal" method="POST" action="position_edited.php">
                        <input type="hidden" class="id" name="id" value="<?php echo $_GET['id']?>">
                        <table border="1">
                            <tr class="trh">
                                <td colspan="2">
                                </td>
                            </tr>
                            <tr>
                                <th>Description: </th>
                                <td><input type="text" id="description" name="description" size="100%" value="<?php print_r($candidate[3]); ?>"required></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="center">
                                    <!--<button type="reset">CLEAR FORM</button>-->
                                    <input type="submit" name="edit" value="SUBMIT"/>
                                </td>
                            </tr>
                        </table>
                </div>
                <!--end of .table-responsive-->
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