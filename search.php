<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<div class="table-responsive">
<table class="table table-striped table-hover">
<tr>
<th>No</th>
<th>IC No</th>
<th>Email</th>
<th>Name</th>
<th>Telephone</th>
<th>Gender</th>
<th>Tools</th>
</tr>
<?php $name = $_POST['searchIC']; // ic number from text box search form ?>
<h2>Searching for &raquo; Name: <?php echo $name; // ic number ?></h2>
<hr />
<?php
$sql = mysqli_query($connection, "SELECT * FROM staff WHERE name LIKE '%$name%'"); // search query for selected ic number
if(mysqli_num_rows($sql) == 0){
echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
}else{ // if there are data
$no = 1; // start from number 1
while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
	echo '
<tr>
<td>'.$no.'</td>
<td>'.$row['icno'].'</td>
<td>'.$row['email'].'</td>
<td><a href="profile.php?icno='.$row['icno'].'">'.$row['name'].'</a></td>
<td>'.$row['telephone'].'</td>
<td>'.$row['gender'].'</td>
<td>
<a href="edit.php?icno='.$row['icno'].'" title="Update Data" data-toggle="tooltip" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
<a href="password.php?icno='.$row['icno'].'" title="Change Password" data-toggle="tooltip" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></a>
<a href="view_users.php?action=delete&icno='.$row['icno'].'" title="Remove Data" data-toggle="tooltip" onclick="return confirm(\'Are you sure to remove this data for '.$row['name'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
</td>
</tr>
';
$no++; // next number
}
}
if(isset($_GET['action']) == 'delete'){ // if delete button clicked
$delete = mysqli_query($connection, "DELETE FROM student WHERE icno='$icno'"); // delete query for this ic number
if($delete){ // if delete execution successful
echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed...</div>'; // display deta removed message
}else{ // if delete unsuccessful
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data
}
}
?>
</table>
</div> <!-- /.table-responsive -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>  