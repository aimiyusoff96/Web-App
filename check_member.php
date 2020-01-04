<?php
//check if user has login
if(!isset($_SESSION['username'])){
die( Header("Location: login.php"));
}
//check user level
if($_SESSION['level']!="Member"){
die( Header("Location: login.php"));
}
?>