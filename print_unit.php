<?php
include('check_admin.php'); //check if user if a mailroom staff
include('header_admin.php'); //load header content for admin
include("connection.php"); // connection to database
?>

<link rel="stylesheet" type="text/css" href="material-kit.css" media="print" />

<div class="container" style="margin-top:50px">
<div class="content">
<h2>Record</h2>
<hr />

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
<th>Status</th>
</tr>
<?php

$sql2=$_SESSION['sql'];
$sql=mysqli_query($connection,$sql2);
if(mysqli_num_rows($sql) == 0){
echo '<tr><td colspan="14">No data retrieved..</td></tr>'; // if no data retrieved from database
}else{ // if there are data
$no = 1; // start from number 1
while($row = mysqli_fetch_assoc($sql)){ // fetch query into array
echo '
<tr>
<td>'.$no.'</td>
<td>'.$row['name'].'</td>
<td>'.$row['matter'].'</td>
<td>'.$row['place'].'</a></td>
<td>'.$row['usr_time'].'</td>
<td>'.$row['date'].'</td>
<td>'.$row['unit'].'</td>
<td>'.$row['status'].'</td>
</tr>
';
$no++; // next number
}
}

?>
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
</table>
<input id="printpagebutton" type="button" class="btn btn-sm btn-success" value="Print this page" onclick="printpage()"/>


</center>
</div>

</div> <!-- /.table-responsive -->
</div> <!-- /.content -->
</div> <!-- /.container -->
</body>
</html>