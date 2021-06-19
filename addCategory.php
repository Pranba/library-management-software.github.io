<?php
include 'connect.php';
session_start();
 
$cname=$_POST['catname'];

$stmt= $con->prepare("INSERT INTO tblcategory (CategoryName) VALUES (?)");
$stmt->bind_param("s", $cname);

$stmt->execute();

header("location:AddBooks.php")

?>