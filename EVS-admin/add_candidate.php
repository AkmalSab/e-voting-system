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
    <h1 class="title">Add Candidate</h1>
    <div class="history">
    </div>

    <div class="container">
        <div class="row">
            <div class="cs-12">

                <div>
                    <form class="form-horizontal" method="POST" action="candidate_added.php">
                        <table border="1">
                            <tr class="trh">
                                <td colspan="2">
                                </td>
                            </tr>
                            <tr>
                                <th>First Name:</th>
                                <td><input type="text" id="firstname" name="firstname" size="100%" required></td>
                            </tr>
                            <tr>
                                <th>Last Name:</th>
                                <td><input type="text" id="lastname" name="lastname" size="100%" required></td>
                            </tr>
                            <tr>
                                <th>ID:</th>
                                <td><input type="text"  placeholder="Last 4-Digits of NRIC" id="candidate_id" name="candidate_id" maxlength="4" onPaste="return false" onkeypress="return onlyNumberKey(event)" required></td>
                            </tr>
                            <tr>
                                <th>Position:</th>
                                <td><select id="position" name="position" required>
                                        <option value="" selected>- Select -</option>
                                        <?php
                                        include 'php/session.php';
                                        $sql = "SELECT * FROM positions WHERE status = 'Pending'";
                                        $query = $conn->query($sql);
                                        while($row = $query->fetch_assoc()){
                                            echo "
                              <option value='".$row['id']."'>".$row['description']."</option>
                            ";
                                        }
                                        ?>
                                    </select></td>
                            </tr>
                            <tr>
                                <th>Photo:</th>
                                <td><input type="file" id="photo" name="photo"></td>
                            </tr>
                            <tr>
                                <th>Manifesto:</th>
                                <td><textarea class="form-control" size="100%" id="platform" name="platform" rows="7"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="center">
                                    <button type="reset">CLEAR FORM</button>
                                    <input type="submit" name="add" value="SUBMIT"/>
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