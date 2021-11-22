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
                        <tr class="tr1">
                            <!--<td>Argentina</td>-->
                            <td>MPP UTeM</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr class="tr1">
                            <!--<td>Australia</td>-->
                            <td>MPP UiTM</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr class="tr1">
                            <!--<td>Greece</td>-->
                            <td>MPP UPM</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr class="tr1">
                            <!--<td>Luxembourg</td>-->
                            <td>MPP UPNM</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr class="tr1">
                            <!--<td>Russia</td>-->
                            <td>MPP UPSI</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
                        <tr class="tr1">
                            <!--<td>Sweden</td>-->
                            <td>MPP USIM</td>
                            <td>Ongoing</td>
                            <td><a href="#">View</a></td>
                            <td><a href="#">View</a></td>
                        </tr>
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