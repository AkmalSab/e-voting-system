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
    <h1 class="title">Pending Candidate List</h1>
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
                            <th>Position</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Manifesto</th>
                            <th>Tools</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="tr1">
                            <td>TIMBALAN MPP UTeM</td>
                            <td><img class="photo" src="../images/hacker.png"></td>
                            <td>ZULAZLI ZULKALRAIN</td>
                            <td><a href="#">View</a></td>
                            <td colspan="2" ><a href="#">Confirm</a> <a href="#"> Reject</a></td>
                        </tr>
                        <tr class="tr1">
                            <td>TIMBALAN MPP UTeM</td>
                            <td><img class="photo" src="../images/hacker.png"></td>
                            <td>WAN MUHD ISMAT WAN AZMY</td>
                            <td><a href="#">View</a></td>
                            <td colspan="2" ><a href="#">Confirm</a> <a href="#"> Reject</a></td>
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