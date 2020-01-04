<?php
include('check_admin.php'); //check if user if an administrator
include('header_admin.php'); //load header content for admin page
include("connection.php"); // connction to database
?>
<div class="container" style="margin-top:50px">
<div class="content">
<h2>Choose email templates &raquo;</h2>
<hr />
<?php
$event = 'Computer Expo';
$icno = $_GET['icno']; // get ic number
$sql = mysqli_query($connection, "SELECT * FROM student WHERE icno='$icno'"); // query for select member by ic number
if(mysqli_num_rows($sql) == 0){
header("Location: profile.php");
}else{
$row = mysqli_fetch_assoc($sql);
}
$name = $row['name'];
$address = $row['address'];
$telephone = $row['telephone'];
$to = $row['email'];
$fee = $row['fee'];
$class = $row['class'];
$status = $row['status'];
$position = $row['position'];
if(isset($_POST['send'])){ // if send email button clicked
$subject = $_POST['email_template'];
if ($subject == 'Welcome Notification'){
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >Arau High School Computer Club</th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$name.",</p>
<hr />
<p style='font-size:25px;'>Welcome to Arau High School Computer Club</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Your current status is ".$status."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Your current position is ".$position."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Contact us if you have any enquiries</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
} elseif ($subject == 'Notice of Payment') {
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >Arau High School Computer Club</th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$name.",</p>
<hr />
<p style='font-size:25px;'>Notice of Late Fee Payment</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Your current balance is RM".$fee."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Please pay ASAP!</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
} else {
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='https://jonlejeng.000webhostapp.com/cclub/assets/img/cclub.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >Arau High School Computer Club</th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi' ".$name.",</p>
<hr />
<p style='font-size:25px;'>Upcoming Event</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Next upcoming event: ".$event."</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Please come and join us..</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";
}
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: Computer Club Administrator <nsyazhri@gmail.com>' . "\r\n";
$headers .= 'Cc: nsyazhri@gmail.com' . "\r\n";
$mail = mail($to,$subject,$message,$headers);
if(!$mail) {
$msg = "<div class='alert alert-danger'>
<span class='glyphicon glyphicon-remove-circle'></span> &nbsp; Error sending email!
</div>";
} else {
$msg = "<div class='alert alert-success'>
<span class='glyphicon glyphicon-ok-circle'></span> &nbsp; Your email was sent successfully.
</div>";
}
}
?>
<form class="form-horizontal" action="" method="post">
<?php
if (isset($msg)) {
echo $msg;
}
?>
<div class="form-group">
<label class="col-sm-3 control-label">Email Templates for <?php echo $name; ?> </label>
<div class="col-sm-3">
<select name="email_template" class="form-control" required>
<option value="Welcome Notification">Welcome Notification</option>
<option value="Notice of Payment">Notice of Payment</option>
<option value="Upcoming Event">Upcoming Event</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">&nbsp;</label>
<div class="col-sm-6">
<input type="submit" name="send" class="btn btn-sm btn-primary" value="Send Email" data-toggle="tooltip" title="Send Email">
<a href="profile.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Back">Back</a>
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