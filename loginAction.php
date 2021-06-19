<?php
include 'connect.php';
session_start();

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $userid=trim($_POST['user']);
    $password=trim($_POST['pass']);

    $data="SELECT * FROM user WHERE userName=? AND pass=?";
    $stmt= $con->prepare($data);
    $stmt->bind_param("ss", $userid, $password);
    $stmt-> execute();
    $result=$stmt->get_result();

    if($result->num_rows>0)
    {
        $row=$result->fetch_assoc();
        $_SESSION['logged_in']=true;
        $_SESSION['id']=$row['userID'];
        $_SESSION['nm']=$row['userName'];
        header("location: dashboard.php");
    }
    else{
         echo "<script type='text/javascript'>alert('Invalid User ID'); window.history.back();</script>";
        
    }
}

$stmt->close();
$con->close();
?>