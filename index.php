<?php
session_start();
$error='';
include "connection.php";
if(isset($_POST['submit']))
{
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
$level = mysqli_real_escape_string($connection,$_POST['level']);
$passcode = md5($password); // Encrypted Password
$sql = "SELECT * FROM user WHERE username='$username' and password='$passcode'";
$query = mysqli_query($connection,$sql);
$row = $query->fetch_array();
$count = $query->num_rows; // if email/password are correct returns must be 1 row
if ($count == 1)
{
$_SESSION['username']=$row['username'];
$_SESSION['level'] = $row['level'];
$_SESSION['icno'] = $row['icno'];
if($row['level'] == "Administrator" && $level=="1")
{
header("Location: admin.php");
}
else if($row['level'] == "Member" && $level=="2")
{
header("Location: member.php");
}
else
{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Login failed - Incorrect user level!
</div>";
}
}
else
{
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Username or Password is invalid !
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
<div id="navbar">
	<div class="navigation-example">
	    
<!-- Navbar Primary  -->
	<nav class="navbar navbar-primary">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-primary">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<div class="logo-container">
					<div class="logo">
						<h5>PEJABAT PENDIDIKAN DAERAH PENDANG </h5>
					</div>
				</div>
			</div>
			<div class="collapse navbar-collapse" id="example-navbar-primary">
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
		                <a href="index.php">
							<i class="material-icons">home</i>
							Home
		                </a>
		            </li>
    				<li>
		                <a href="signup.php">
							<i class="material-icons">account_circle</i>
							Register Here
		                </a>
		            </li>
				</ul>
			</div>
		</div></div></div>
	</nav>
<!-- End Navbar Primary -->

<br><br>
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
								<p class="text-divider"><b>RECIPIENT LOG IN</b></p>

								<div class="content">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<input type="text" class="form-control" placeholder="Username" name="username" required /> 
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" class="form-control" placeholder="Password" name="password" required /> 
									</div>
									
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">group</i>
										</span>
											<select name="level" class="form-control" placeholder="Level" required>
												<option value="">Choose User Level</option>
												<option value="1">Administrator</option>
												<option value="2">Staff</option>
											</select>
									</div>
									
																	
									<div class="footer text-center"> 
										<button type="submit" class="btn btn-primary" name="submit">Log In</a>
									</button>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>

<br/><br/><br/><br/>
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
	<script src="assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

	<script type="text/javascript">

		$().ready(function(){
			// the body of this function is in assets/material-kit.js
			materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

				$(window).on('scroll', materialKitDemo.checkScrollForParallax);
			}

		});
	</script>
</html>
