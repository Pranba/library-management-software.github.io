<?php
include 'connect.php';

 
$bookname=$_POST['bname'];
$athr=$_POST['author'];
$sbn=$_POST['isbn'];
$edtion=$_POST['edtn'];
$price=$_POST['price'];
$qnty=$_POST['qnty'];
$pbsr=$_POST['publisher'];
$pyear=$_POST['pyar'];
$ctgry=$_POST['cate'];


$stmt= $con->prepare("INSERT INTO books (bname, author, isbn, edtn, price, qnty, publisher, pyear, category) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssisss", $bookname, $athr, $sbn, $edtion, $price, $qnty, $pbsr, $pyear, $ctgry);

$stmt->execute();

header("location:dashboard.php")

?>