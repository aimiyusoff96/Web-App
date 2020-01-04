<?php
session_start();
$icno = $_SESSION['icno'];
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Change Password &raquo;</h2>
<hr />
<p>Change password for member with IC Number: <?php echo '<b>'.$_GET['icno'].'</b>'; // get ic number to change password ?></p>
<?php
if(isset($_POST['change'])){ // if change button clicked
$icno = $_GET['icno'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
if($password1 == $password2){ // if password 1 same as password 2
if(strlen($password1) >= 6){ // minimum 6 character
$pass = md5($password1); // md5 encryption
$update = mysqli_query($connection, "UPDATE user SET password='$pass' WHERE icno='$icno'"); // query update password
if($update){ // if update query successful
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password change successful. <a href="view_users.php"><- Back</a></div>';
}else{ // if updating failed
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot change password.</div>';
}
}else{ // if password less than 6
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Minimum password length is 6 character.</div>';
}
}else{ // if password 1 not same as password 2
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password not match</div>';
}
}
?>
<!-- Form to update password -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">New Password</label>
<div class="col-sm-4">
<input type="password" name="password1" class="form-control" placeholder="New Password" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Re-enter New Password</label>
<div class="col-sm-4">
<input type="password" name="password2" class="form-control" placeholder="Re-enter New Password" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="change" class="btn btn-sm btn-info" value="Change" data-toggle="tooltip" title="Change Password">
<a href="view_users.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel"><b>Cancel</b></a>
</div>
</div>
</form>
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>