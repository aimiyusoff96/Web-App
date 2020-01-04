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
<h2>Add Record &raquo;</h2>
<hr />
<?php
//Default status and position
$status = 'Inactive';
$position = 'Member';
if(isset($_POST['add'])){ // if button Add clicked
$name = $_POST['name'];
$matter = $_POST['matter'];
$place = $_POST['place'];
$usr_time = $_POST['usr_time'];
$date = $_POST['date'];
$unit = $_POST['unit'];
$insert = mysqli_query($connection, "INSERT INTO record(name, matter, place, usr_time, date, unit) VALUES('$name', '$matter', '$place', '$usr_time', '$date', '$unit')") or die(mysqli_error($connection)); // query for adding data into database
if($insert){ // if query executed successfully
echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data for new member added.. <a href="member.php"><- Back</a></div>'; // display message data saved successfully.'
}else{ // if query unsuccessfull
echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Cannot add data for new member! <a href="member.php"><- Back</a></div>'; // display message data unsuccessfull added!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">

<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-3">
<input type="name" name="name" class="form-control" placeholder="name" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Matter</label>
<div class="col-sm-3">
<input type="text" name="matter" class="form-control" placeholder="matter" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Place</label>
<div class="col-sm-3">
<input type="text" name="place" class="form-control" placeholder="place" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Time</label>
<div class="col-sm-3">
<input type="time" name="usr_time" class="form-control" placeholder="time" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Date</label>
<div class="col-sm-3">
<input type="text" name="date" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="DD-MM-YYYY" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">Unit</label>
<div class="col-sm-2">
<select name="unit" class="form-control" required>
<option value=""> - Select Unit - </option>
<option value="Pengurusan">Pengurusan</option>
<option value="FasiLINUS">FasiLINUS</option>
<option value="ICT">ICT</option>
<option value="JQAF">JQAF</option>
<option value="SISC+">SISC+</option>
<option value="Kokurikulum">Kokurikulum</option>
<option value="Pengurusan">Pengurusan Sekolah</option>
<option value="Pentadbiran">Pentadbiran</option>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="add" class="btn btn-sm btn-primary" value="Save" data-toggle="tooltip" title="Save member data">
<a href="member.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a>
</div>
</div>

</form> <!-- /form -->
</div> <!-- /.content -->
</div> <!-- /.container -->
<script>
$('.datepicker').datepicker({
format: 'dd-mm-yyyy',
})
</script>
</body>
</html>