<?php

session_start(); //starts all the sessions 
if($_SESSION["logged_in"] == NULL) {
   header('Location: unath.html'); //take user to the login page if there's no information stored in session variable
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li>
                <a href="">Data Entry &#9662;</a>
                <ul class="dropdown">
                    <li><a href="AddBooks.php">Add New Books</a></li>
                    <li><a href="AddReader.php">Add Reader</a></li>
                    <li><a href="issue.php">Issue Book</a></li>
                    <li><a href="returnbooks.php">Return Books</a></li>
                </ul>
            </li>
            <li><a href="">Report</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
        
    </nav>
    <div class="col">
            
    </div>

    <div class="container">
        <div id="dashboard">
        <h2 style="text-align: center;">DASHBOARD</h2>
        <div class="dash">
            <div class="dash1">
                <div style="clear: both">
                    <h2 style="float: left">Nos. of Books</h2>
                    <h2 style="float: right"><?php
                    include 'connect.php';
                        $query="SELECT SUM(qnty) as bookqnty FROM books";
                        $result=mysqli_query($con, $query);
                        $data=mysqli_fetch_array($result);
                    echo $data['bookqnty'];
                    ?>
                </h2>
                </div>
                <div class="box">
                    <a href="listofbooks.php">List of Books</a>
                </div>
            </div>

            <div class="dash1">
                <div style="clear: both">
                    <h2 style="float: left">Nos. of Reader</h2>
                    <h2 style="float: right"><?php
                    include 'connect.php';
                        $query="SELECT * FROM reader";
                        $result=mysqli_query($con, $query);
                        $data=mysqli_num_rows($result);

                        echo $data;
                        ?>
                    </h2>
                </div>
                <div class="box">
                    <a href="readerlist.php">List of Readers</a>
                </div>
            </div>
            <div class="dash1">
            <div style="clear: both">
                    <h2 style="float: left">Nos. Book Issued</h2>
                    <h2 style="float: right">
                        <?php
                        include 'connect.php';
                            $query="SELECT * FROM issue";
                            $result=mysqli_query($con, $query);
                            $data=mysqli_num_rows($result);
                        echo $data;
                        ?>
                    </h2>
                </div>
                <div class="box">
                    <a href="issuelist.php">Issu List</a>
                </div> 
            </div>

        </div>
        </div>
    </div>
    <div class="footer">
        
    </div>
</body>
</html>