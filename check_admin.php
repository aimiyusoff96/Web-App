<?php
session_start();
//check if user has login..if not goto login page
if(!isset($_SESSION['username'])){
die( Header("Location: login.php"));
}
//check user level..if not goto login page
if($_SESSION['level']!="Administrator"){
die( Header("Location: login.php"));
}
?>