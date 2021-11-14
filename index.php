<?php
session_start();
if(isset($_SESSION['admin'])){
    header('location: admin/home.php');
}

if(isset($_SESSION['voter'])){
    header('location: home.php');
}
?>

<?php include 'includes/header.php'; ?>
<body style=" overflow-y: hidden; " class="hold-transition login-page ">
<div class="login-box">
    <div class="login-logo">
        <img src="https://img.icons8.com/small/40/000000/elections.png">
        <b style="color: #0a0a0a" >E-Undi</b>
    </div>

    <div style="border-radius: 25px;" class="login-box-body">
        <p class="login-box-msg">Voter sign in</p>

        <form action="login.php" method="POST">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-md-12 column">
                    <button style="border-radius: 25px;" type="submit" class="btn btn-success btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                </div>
        </form>

    </div>
    <div class="row">
        <p style="padding-left: 80px;"> No Account yet? <a href="#addnew" data-toggle="modal"> REGISTER HERE</a></p>
    </div>
    <!--<div class="row">
        <div class="col-md-6 column">
            <button style="border-radius: 25px;" href="#addnew" data-toggle="modal" class="btn btn-primary btn-block btn-flat"><i class="fa fa-user-plus"></i> Register </button>
        </div>
    </div>-->
    <?php
    if(isset($_SESSION['error'])){
        echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
        unset($_SESSION['error']);
    }
    else{

    }
    ?>
</div>

<?php include 'includes/scripts.php' ?>
<?php include 'includes/voters_modal.php'; ?>

</body>
