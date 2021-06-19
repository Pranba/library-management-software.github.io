<?php

    // Insert the content of connection.php file
    include('connect.php');
    
    // Delete data from the database
    if(ISSET($_POST['deleteData']))
    {
        $id = $_POST['deleteId']; 

        $sql = "DELETE FROM books WHERE bID='$id'";
        $result = mysqli_query($con, $sql);

        if($result){
            echo '<script> alert("Data Deleted."); </script>';
            header('Location: listofbooks.php');
        }else{
            echo '<script> alert("Data Not Deleted."); </script>';
        }
    }
?>