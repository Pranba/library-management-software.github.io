<?php
$con=mysqli_connect ("localhost", "root", "", "library"); /*Here the $con=new is the object */

if($con==FALSE)
{
    die("Error occured".mysqli_connect_error());
    /* we can use echo but it will show the error, if we use die it will kill the script */
}
?>