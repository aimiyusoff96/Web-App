<?php
session_start();
$icno = $_SESSION['icno'];
//check if user has login
include('check_member.php'); //check if member logged in
include('header_member.php'); //load header content for member page
include("connection.php"); // connction to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Update Member Data &raquo;</h2>
<hr />
<?php

$sql = "SELECT icno, name, gender, dob, address, telephone, email, class, status, position FROM student WHERE icno='$icno'" ;
$result = $connection->query($sql);

if ($result ->num_rows > 0){
	
	$row = $result->fetch_assoc();
	
	if(isset($_POST['update'])){ // if button Add clicked
		$name = $_POST['name'];
		$gender = $_POST['gender'];
		$dob = $_POST['dob'];
		$address = $_POST['address'];
		$telephone = $_POST['telephone'];
		$email = $_POST['email'];
		$class = $_POST['class'];
		
		
		$update = mysqli_query($connection, "UPDATE student SET name='$name', gender='$gender', dob='$dob', address='$address', telephone='$telephone', email='$email', class='$class' WHERE icno='$icno'"); // query for selected ic number
		
		if($update) {
			header('Location: member_profile.php');
		}
		else {
				echo "Something happened";
		}
	}
	
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="edit_member.php" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">IC No</label>
<div class="col-sm-2">
<input type="text" name="icno" class="form-control" placeholder="<?php echo $icno;?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2">
<select name="gender" class="form-control" required>
<option value="<?php echo $row['gender'] ?>"> <?php echo $row['gender']?> </option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Date of Birth</label>
<div class="col-sm-3">
<input type="text" name="dob" class="input-group datepicker form-control" value="<?php echo $row['dob'];?>" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control"><?php echo $row['address'] ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Telephone No</label>
<div class="col-sm-3">
<input type="text" name="telephone" class="form-control" placeholder="Telephone No" value="<?php echo $row['telephone'];?>"required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email'];?>"required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Class</label>
<div class="col-sm-2">
<select name="class" class="form-control" required>
<option value="<?php echo $row['class']?>"><?php echo $row['class']?></option>
<option value="Form 1">Form 1</option>
<option value="Form 2">Form 2</option>
<option value="Form 3">Form 3</option>
<option value="Form 4">Form 4</option>
<option value="Form 5">Form 5</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Status</label>
<div class="col-sm-2">
<input type="text" name="status" class="form-control" placeholder="<?php echo $row['status'];?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Position</label>
<div class="col-sm-2">
<input type="text" name="position" class="form-control" placeholder="<?php echo $row['position'];?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="update" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update member data">
<a href="member.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>
</form> <!-- /form -->
<?php
} else {
	echo "No member data yet.";
}
?>
<center>CLICK HERE TO UPLOAD PROFILE PICTURE.<br><br>
<center><form action = "" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "file" />
         <button type = "submit" name = "submit">UPLOAD</button><br>
</form>
<?php 
if(isset($_POST["submit"])) {
	$target_dir ="assets/img/members/ ";
	$target_file = $target_dir.basename($_FILES["file"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo ($target_file,PATHINFO_EXTENSION);
	$check = getimagesize($_FILES["file"]["tmp_name"]);
	
	if($check !== false)
	{
		$upOk = 1;
	}
	
	else 
	{
		echo "Error to upload";
		$upOk = 0;
	}
	
	if($_FILES["file"]["size"] > 1000000) {
         echo "Your file size is too large.";
		 $upOk = 0;
      }
	
	if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
		echo "Wrong file type";
		$upOk = 0;
	}
	
	if ($upOk == 0)
	{
		echo "Failed to upload";
	}
	else 
	{
		if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file))
		{
			echo "" . basename($_FILES["file"]["name"]). "successfully uploaded";
			mysqli_query($connection, "UPDATE student SET image='$target_file' WHERE icno='$icno' ");
		}
		else{
			echo "Sorry, failed to upload";
		}
	}	 
}
?>
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>