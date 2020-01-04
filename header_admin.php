<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" href="assets/img/uitmpls.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>PPD PENDANG</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>

</head>
<body>
<div class="main main-raised">
<div class="section section-basic">	
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
								<h5>PEJABAT PENDIDIKAN DAERAH PENDANG</h5>
							</div>
						</div></div>
							
							<div class="collapse navbar-collapse" id="example-navbar-primary">
								<ul class="nav navbar-nav navbar-right">
									<li class="active">
		                                <a href="admin.php">
											<i class="material-icons">home</i>
											Home
		                                </a>
		                            </li>
		                            <li>
									<li>
		                                <a href="filter_date.php">
											<i class="material-icons">event</i>
											Filter by Date
		                                </a>
		                            </li>
		                            <li>
		                                <a href="view_users.php">
											<i class="material-icons">event_note</i>
		                                    Filter by Unit
		                                </a>
		                            </li>		                            
									<li>
									<form name="search" method="post" action="search.php" role="search" class="navbar-form navbar-right">
										<div class="form-group">
											<input type="text" name="searchIC" placeholder="Search By Name" class="form-control">
										</div>
										<button type="submit" name="submit" id="submit" value="search" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Search by Name"><span class="glyphicon glyphicon-search"></span> Search </button>
									</li>
									<li class="dropdown">
	                                		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="material-icons">account_circle</i>
												<b class="caret"></b>
											</a>
	                                    	<ul class="dropdown-menu dropdown-menu-right">
	                                        	
	                                        	<li><a href="logout.php">Logout</a></li>
		                                    </ul>
											
	                                </li>
								</ul>
</form>
							</div>
						</div></div></div>
					</nav>
					<!-- End Navbar Primary -->
</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

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
