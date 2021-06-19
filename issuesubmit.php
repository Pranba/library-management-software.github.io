  <?php
include 'connect.php';
session_start();
 
$cardno=$_POST['card'];
$readern=$_POST['rName'];
$bname=$_POST['bname'];
$dat=$_POST['date'];
$user=$_SESSION['nm'];



$stmt= $con->prepare("INSERT INTO issue (card_no, rName, bName, issue_date, UserName) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("issss", $cardno, $readern, $bname, $dat, $user);

$stmt->execute();

header("location:issue.php")

?>