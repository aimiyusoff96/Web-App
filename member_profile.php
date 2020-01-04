<?php
session_start();
$icno = $_SESSION['icno'];
//check if user has login
include('check_member.php'); //load header content for member page
include('header_member.php'); //load header content for member page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>View Details &raquo;</h2>
<hr />
<?php
$sql = mysqli_query($connection, "SELECT * FROM student WHERE icno='$icno'");
// query for selecting ic number from db
if(mysqli_num_rows($sql) == 0){
header("Location: student.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
?>
<!-- Display member details -->
<table class="table table-striped table-condensed">
<img src="<?php echo $row ['image'] ?>" width=300 height=300>
<tr>
<th width="20%">IC No</th>
<td><?php echo $row['icno']; ?></td>
</tr>
<tr>
<th>Name</th>
<td><?php echo $row['name']; ?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $row['gender']; ?></td>
</tr>
<tr>
<th>Date of Birth</th>
<td><?php echo $row['dob']; ?></td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $row['address']; ?></td>
</tr>
<tr>
<th>Telephone</th>
<td><?php echo $row['telephone']; ?></td>
</tr>
<tr>
<th>Email</th>
<td><?php echo $row['email']; ?></td>
</tr>
<tr>
<th>Class</th>
<td><?php echo $row['class']; ?></td>
</tr>
<tr>
<th>Status</th>
<td><?php echo $row['status']; ?></td>
</tr>
<tr>
<th>Position</th>
<td><?php echo $row['position']; ?></td>
</tr>
</table>
<a href="member.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Back</a>
<a href="edit_member.php?icno=<?php echo $row['icno']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Update Data</a>
<?php
if(($row['status']) == 'Active'){
echo '<a href="print_letter.php?icno='.$row['icno'].'" target="_blank" title="Print Letter" data-toggle="tooltip" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print Letter</a>';
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