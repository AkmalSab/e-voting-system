<?php  session_start();  ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bonos-admin2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Register Admin</title>    
<body bgcolor="#ACD9FA">
    <h1 class="title">Register Admin</h1>    
    <div id="container">
        <form class="formClass" method="POST" enctype="multipart/form-data" action="registration.php">
            <h2 class="subtitle">Admin Registration</h2>
            <div>
                <p class="formLabel">First name:</p>
                <input style="text-transform: uppercase;" type="text" class="form-control" id="firstname" name="firstname" required>
            </div>
            <div>
                <p class="formLabel">Last name:</p>
                <input style="text-transform: uppercase;" type="text" class="form-control" id="lastname" name="lastname" required>
            </div>
            <div>
                <p class="formLabel">Identity Card Number:</p>
                <input placeholder="987654321011" maxlength="12" type="text" onkeypress="return onlyNumberKey(event)" class="form-control" id="admin_id" name="admin_id" required>            
            </div>
            <div>
                <p class="formLabel">Phone:</p>
                <input placeholder="0123456789" minlength="10" maxlength="12" type="text" onkeypress="return onlyNumberKey(event)" id="phone" name="phone" required>
            </div>
            <div>
                <p class="formLabel">Profile photo:</p>
                <input type="file" id="photo" name="photo" required>
            </div>
            <div>
                <p class="formLabel">Password:</p>
                <input type="password" placeholder="Password" id="password" name="password" required>
                <div>
                    <input type="checkbox" onclick="viewPassword()">Show password
                </div>
            </div> 
            <div>
                <p class="formLabel">Confirm Password:</p>
                <input type="password" placeholder="Confirm password" id="confirmpassword" name="confirmpassword" required>
            </div>            
            <div class="formSubmit">
                <div class="buttonCol">
                    <button type="submit" name="add" class="formLabel">Sign Up</button>
                </div>
                <div class="buttonCol">
                    <button type="reset" class="formLabel">Clear</button>
                </div>
            </div>
            <div id="formRegister">
                <p class="formLabel">Already have an account? <a href="index.html">Login Here</a></p>
            </div>
        </form>
    </div>
<script src="js/bonos-admin.js"></script>
</body>
</html>