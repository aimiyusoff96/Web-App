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
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
	  
	  
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png","gif");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG, GIF or PNG file.";
      }
      
      if($file_size > 1097152) {
         $errors[]='File size must be excately 1 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"C:/xampp/htdocs/comclub/assets/img/members/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>
<html>
   <body>
   </body>
</html>
