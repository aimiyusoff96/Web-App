<!DOCTYPE html>
<html>
<head>
<title>Administrator Page</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css" >
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tooltip.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<!-- top navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand hidden-xs hidden-sm" href="index.php" target="_blank">Pejabat Pendidikan Daerah Pendang</a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li class="active"><a href="admin.php"><span class="glyphicon glyphicon-home"></span> Admin Home</a></li>
<li><a href="view_users.php" data-toggle="tooltip" data-placement="bottom" title="View List"><span class="glyphicon glyphicon-list"></span> Filter By Unit</a></li>
<li><a href="filter_date.php" data-toggle="tooltip" data-placement="bottom" title="View List"><span class="glyphicon glyphicon-list"></span> Filter By Date</a></li>
</ul>
<form name="search" method="post" action="search.php" role="search" class="navbar-form navbar-right">
<div class="form-group">
<input type="text" name="searchIC" placeholder="Search By Name" class="form-control">
</div>
<button type="submit" name="submit" id="submit" value="search" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Search by Name"><span class="glyphicon glyphicon-search"></span> Search </button>
</form>
</div>
</div>
<div class="container">
<div class="pull-left">
Welcome, <i><?php echo $_SESSION['username']; ?></i>
</div>
<div class="pull-right">
<a class="navbar-link" href="logout.php">Logout</a>
</div>
</div>
</nav>