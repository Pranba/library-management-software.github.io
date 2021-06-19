<?php
include 'connect.php';

$returndate = $_POST['rdate'];
$rbook = $_POST['returnbook'];
$id = $_POST['id'];



$stmt= $con->prepare("UPDATE issue SET return_date = ?, return_book = ? WHERE sID= ? ");
$stmt->bind_param("sss", $returndate, $rbook, $id);

$stmt->execute();

header("location:issue.php");
            

?>