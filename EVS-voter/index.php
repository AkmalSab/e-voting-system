<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bonos-voter2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>E-undi</title>
<body bgcolor="#ACD9FA">
    <h1 class="title">E-Voting System</h1>
    <div id="container">
        <form class="formClass" action="login.php" method="POST">
            <h1 class="subtitle">Voter Login</h1>
            <?php 
                if(isset($_GET['error'])){
                    $error = $_GET['error'];

                    if($error == "notfound"){
                        echo '<p class="error">User not found!</p>';                     
                    }
                    elseif($error == "mismatch"){
                        echo '<p class="error">NRIC or password may be wrong!</p>';    
                    }
                    elseif($error == "null"){
                        echo '<p class="error">Please enter all field!</p>';   
                    }
                }
            ?>
            <div>
                <p class="formLabel">NRIC:</p>
                <input placeholder="Last 4-Digits of NRIC" type="text" maxlength="4" onkeypress="return onlyNumberKey(event)" id="voter" name="voter" required>
            </div>
            <div>
                <p class="formLabel">Password:</p>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <div>
                    <input type="checkbox" onclick="viewPassword()">Show password
                </div>
            </div>            
            <div class="formSubmit">
                <button type="submit" class="formLabel" name="login">Sign In</button>
            </div>
            <div id="formRegister">
                <p class="formLabel">No Account yet? <a href="register.php">Register Here</a></p>
            </div>
        </form>
    </div>
<script src="js/bonos-voter.js"></script>
</body>
</html>