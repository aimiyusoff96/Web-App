<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Member Details &raquo;</h2>
<hr />
<?php
$name = $_GET['name']; // get selected ic number
$sql = mysqli_query($connection, "SELECT * FROM record WHERE name='$name'"); // query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: view_users.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
if(isset($_GET['action']) == 'delete'){ // if delete button clicked
$delete = mysqli_query($connection, "DELETE FROM record WHERE name='$name'"); // query for deleting data based on ic number
if($delete){ // if query executed successfully
echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data removed.</div>'; // display data removed.'
}else{ // if query unsuccessful
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Cannot remove data.</div>'; // display message cannot remove data.'
}
}
?>
<!-- Display member details -->
<table class="table table-striped table-condensed">
<tr>
<th width="10%">Name :</th>
<td><?php echo $row['name']; ?></td>
</tr>
<tr>
<th>Matter :</th>
<td><?php echo $row['matter']; ?></td>
</tr>
<tr>
<th>Place :</th>
<td><?php echo $row['place']; ?></td>
</tr>
<tr>
<th>Time :</th>
<td><?php echo $row['usr_time']; ?></td>
</tr>
<tr>
<th>Date :</th>
<td><?php echo $row['date']; ?></td>
</tr>
<tr>
<th>Unit :</th>
<td><?php echo $row['unit']; ?></td>
</tr>
</table>

<?php
if(isset($_POST['submit'])){
$status = $_POST['status'];
$insert = mysqli_query($connection, "UPDATE record SET status = '$status' WHERE name= '$name'") or die(mysqli_error()); // query for adding data into database 
if($insert){ // if query executed successfully 
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Approved!</div>'; // display message record successful added!'
}else{ // if data unsuccessful in database
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Denied!</div>'; // display message record unsuccessful..!'
}
}
?>
<form action="#" method="post">
<div class="form-group">
<div class="col-sm-2">
<select name="status" class="form-control" required>
<option value=""> - Select Status - </option>
<option value="Approved">Approved</option>
<option value="Denied">Denied</option>
</select>
</div>
</div>
<input type="submit" name="submit" value="Send" />
</form><br/>

<form class="button">
<div class="form-group">
<a href="view_users.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<a href="edit.php?icno=<?php echo $row['icno']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data</a>
<a href="profile.php?action=delete&icno=<?php echo $row['icno']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure remove data belong to <?php echo $row['name']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove Data</a>
<a href="email.php?icno=<?php echo $row['icno']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Email Notification</a>
</div>
</form><br/><br/>

</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>