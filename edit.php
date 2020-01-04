<?php
session_start();
$icno = $_SESSION['icno'];
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Edit Member Details &raquo;</h2>
<hr />
<?php
$icno = $_GET['icno']; // get ic number
$sql = mysqli_query($connection, "SELECT * FROM student WHERE icno='$icno'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: view_users.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
if(isset($_POST['save'])){ // if save button clicked
$icno = $_POST['icno'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$class = $_POST['class'];
$status = $_POST['status'];
$position = $_POST['position'];
$fee = $_POST['fee'];
$update = mysqli_query($connection, "UPDATE student SET name='$name', gender='$gender', dob='$dob', address='$address', telephone='$telephone', email='$email', class='$class', status='$status', position='$position', fee='$fee' WHERE icno='$icno'") or die(mysqli_error()); // query for update data in database
if($update){ // if update query execution successful
header("Location: edit.php?icno=".$icno."&process=success"); // add process-success in URL
}else{ // if update query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot update data, please try again.</div>'; // display cannot update message'
}
}
if(isset($_GET['process']) == 'success'){ // if process-success available in update update
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data updated. <a href="view_users.php"><- Back</a></div>'; // display data updated.'
}
?>
<!-- Form for updating data -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="icno" value="<?php echo $row ['icno']; ?>" class="form-control" placeholder="IC No" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" value="<?php echo $row ['name']; ?>" class="form-control" placeholder="Name" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2">
<select name="gender" class="form-control" required>
<option value=""><?php echo $row['gender']; ?></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
<div class="col-sm-4">
<input type="text" name="dob" value="<?php echo $row ['dob']; ?>" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control" placeholder="Address"><?php echo $row ['address']; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Telephone</label>
<div class="col-sm-3">
<input type="text" name="telephone" value="<?php echo $row ['telephone']; ?>" class="form-control" placeholder="Telephone" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="Email" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="class" class="form-control" required>
<option value=""> - Select Class - </option>
<option value="Form 1">Form 1</option>
<option value="Form 2">Form 2</option>
<option value="Form 3">Form 3</option>
<option value="Form 4">Form 4</option>
<option value="Form 5">Form 5</option>
</select>
</div>
<div class="col-sm-3">
<b>Current Class :</b> <span class="label label-success"><?php echo $row['class']; ?></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Status</label>
<div class="col-sm-2">
<select name="status" class="form-control" required>
<option value=""><?php echo $row['status']; ?></option>
<option value="Active">Active</option>
<option value="Inactive">Inactive</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Position</label>
<div class="col-sm-2">
<select name="position" class="form-control" required>
<option value=""> - Select Position - </option>
<option value="Member">Member</option>
<option value="Secretary">Secretary</option>
<option value="Treasurer">Treasurer</option>
<option value="Vice President">Vice President</option>
<option value="President">President</option>
</select>
</div>
<div class="col-sm-3">
<b>Current Position :</b> <span class="label label-success"><?php echo $row['position']; ?></span>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Fee</label>
<div class="col-sm-4">
<input type="text" name="fee" value="<?php echo $row ['fee']; ?>" class="form-control" placeholder="Fee" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="save" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update member details">
<a href="view_users.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
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