<?php
session_start();
$icno = $_SESSION['icno'];
include('check_member.php'); //check if user if an administrator
include('header_member.php'); //load header content for admin page
include("connection.php"); // connection to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<center><h2>List of Record</h2></center>
<hr />
<?php
if(isset($_GET['action']) == 'delete'){ // if remove button clicked
$name = $_GET['name']; // get name value
$check = mysqli_query($connection, "SELECT * FROM record WHERE name='$name'"); // query for selected ic number
if(mysqli_num_rows($check) == 0){ // if no name selected
echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No data found..</div>'; // display message no data found.'
}else{ // if there are data found
$delete = mysqli_query($connection, "DELETE FROM record WHERE name='$name'"); // query for removing data
if($delete){ // if delete query successful
echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data removed successfully.</div>'; // display message data removed'
}else{ // if delete query unsuccessful
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot remove data.</div>'; // display message cannot remove data'
}
}
}
?>
<!-- filtering members based on class -->
<form class="form-inline" method="get">
<div class="form-group">
<select name="filter" class="form-control" onchange="form.submit()">
<option value="0"> Filter Staff by Unit </option>
<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
<option value="Pengurusan" <?php if($filter == 'Pengurusan'){ echo 'selected'; } ?>>Pengurusan </option>
<option value="FasiLINUS" <?php if($filter == 'FasiLINUS'){ echo 'selected'; } ?>>FasiLINUS</option>
<option value="ICT" <?php if($filter == 'ICT'){ echo 'selected'; } ?>>ICT</option>
<option value="JQAF" <?php if($filter == 'JQAF'){ echo 'selected'; } ?>>JQAF</option>
<option value="SISC+" <?php if($filter == 'SISC+'){ echo 'selected'; } ?>>SISC+</option>
<option value="Kokurikulum" <?php if($filter == 'Kokurikulum'){ echo 'selected'; } ?>>Kokurikulum</option>
<option value="Pengurusan Sekolah" <?php if($filter == 'Pengurusan Sekolah'){ echo 'selected'; } ?>>Pengurusan Sekolah</option>
<option value="Pentadbiran" <?php if($filter == 'Pentadbiran'){ echo 'selected'; } ?>>Pentadbiran</option>
</select>
</div>

</form> <!-- end filter -->
<br />

<!-- start responsive table-->
<div class="table-responsive">
<table class="table table-striped table-hover">
<tr>
<th>No</th>
<th>Name</th>
<th>Matter</th>
<th>Place</th>
<th>Time</th>
<th>Date</th>
<th>Unit</th>
</tr>
<?php
if($filter){
$sql = mysqli_query($connection, "SELECT * FROM record WHERE unit='$filter' ORDER BY name ASC"); // query -filter
}
else{
$sql = mysqli_query($connection, "SELECT * FROM record ORDER BY name ASC"); // if no filter
}
if(mysqli_num_rows($sql) == 0){
echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
}
else{ // if there are data
$no = 1; // start from number 1
while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
echo '
<tr>
<td>'.$no.'</td>
<td>'.$row['name'].'</td>
<td>'.$row['matter'].'</td>
<td>'.$row['place'].'</td>
<td>'.$row['usr_time'].'</td>
<td>'.$row['date'].'</td>
<td>'.$row['unit'].'</td>
</tr>
';
$no++; // next number
}
}
?>
</table>
</div> <!-- /.table-responsive -->
</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>