<?php
session_start();
if($_SESSION){
if($_SESSION['level']=="Administrator")
{
header("Location: admin.php");
}
if($_SESSION['level']=="Member")
{
header("Location: member.php");
}
}
require_once 'connection.php';
if(isset($_POST['btn-signup'])) {
$icno=mysqli_real_escape_string($connection,$_POST['icno']);
$username=mysqli_real_escape_string($connection,$_POST['username']);
$password=mysqli_real_escape_string($connection,$_POST['password']);
$password=md5($password); // Encrypted Password
$level = "Member";
$check_icno = $connection->query("SELECT icno FROM user WHERE icno='$icno'");
$countic = $check_icno->num_rows;
$check_username = $connection->query("SELECT username FROM user WHERE username='$username'");
$countun = $check_username->num_rows;
if (($countic==0) && ($countun==0)){
$query = "INSERT INTO user(username,password,level,icno) VALUES ('$username','$password','$level','$icno')";
if ($connection->query($query)) {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered - User level is Member !
</div>";
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !
</div>";
}
} else {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry.. Username or IC Number already exist!
</div>";
}
$connection->close();
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="assets/img/uitmpls.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PPD | PEJABAT PENDIDIKAN DAERAH PENDANG</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

</head>
<body>
<!-- Top content -->
<br><br><br><br>
<form role="form" class="login-form" method="post" id="register-form"> 
	<?php 
	if (isset($msg)) { 
	echo $msg; 
	} 
	?> 
    
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup">
							<form class="form" method="" action="">
								<div class="header header-primary text-center">
								PPD PENDANG
								</div>
								<p class="text-divider"><b>SIGN UP</b></p>

								<div class="content">
								<br> 
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">person_pin</i>
										</span>
										<input type="text" class="form-control" placeholder="IC Number - without dash -" name="icno" required /> 
									</div>
									<br>
									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" class="form-control" placeholder="Username" name="username" required /> 
									</div>
									<br>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" class="form-control" placeholder="Password" name="password" required /> 
									</div>
									
									<div class="footer text-center">
										<button type="submit" class="btn btn-primary" name="btn-signup">Sign Up</a></button>
									</div>
																	
									<div class="footer text-center"> 
										<a href="index.php" class="btn btn-primary" >Log In Here!</a>
									</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
<!--[if lt IE 10]>
<script src="assets/js/placeholder.js"></script>
<![endif]-->
</body>
</html>