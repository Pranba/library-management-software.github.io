<?php
include_once("connect.php");
if($_REQUEST['empid']) {
	$sql = "SELECT rID, card_no, rname, mobile, email,  FROM employee WHERE id='".$_REQUEST['empid']."'";
	$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));	
	$data = array();
	while( $rows = mysqli_fetch_assoc($resultset) ) {
		$data = $rows;
	}
	echo json_encode($data);
} else {
	echo 0;	
}
?>