<?php
include 'connect.php';
$nameErr = "";
$name = "";
session_start(); //starts all the sessions 
if($_SESSION["logged_in"] == NULL) {
   header('Location: unath.html'); //take user to the login page if there's no information stored in session variable
}
$is_unique = false;
$num = false;
while (!$is_unique){
    $num = rand(10000000,50000000);
    $sel_query  = "SELECT rID from reader where rID = " . $num; 
    $result2 =  $con->query($sel_query) or die($mysqli->error);
    if (!mysqli_fetch_array($result2)){
        $is_unique = true;
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AddReader</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
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
        <div class="col"></div>

    <div class="container">
        <div class="panel panel-default" style="width:70%" >               
            <div class="panel-heading">
                <span class="text-primary">Add Reader</span>
                <span class="text-muted pull-right today" title="today"></span> </div>
                <div class="panel-body sty">
                            
                <fieldset class="col-md-12">    	
                   <!-- <legend>Book Details</legend>  -->
                        <form action="readersubmit.php" method="POST" enctype="multipart/form-data" onSubmit="if(!confirm('Are you ready to submit?')){return false;}">
                            
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="cardno" value="<?php echo $num;?>" readonly readonly>
                            </div>
                            
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" placeholder="Please Enter the Name" required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="fname">Father's Name</label>
                              <input type="text" class="form-control" id="fname" name ="fname" placeholder="Father's Names" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                              <label for="mobile">Mobile No.</label>
                              <input type="text" class="form-control" id="mobilen" name="mobilen" placeholder="Please Enter the Name" required>
                            </div>

                            <div class="form-group col-md-6">
                              <label for="mail">Email</label>
                              <input type="text" class="form-control" id="mail" name ="mail" placeholder="Father's Names" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="ad1">Address Line 1</label>
                                <input type="text" class="form-control" id="ad1" name="ad1" placeholder="Address Line 1" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="ad2">Address 2</label>
                                <input type="text" class="form-control" id="ad2" name="ad2" placeholder="address Line 2" required>
                            </div>
                            
                             
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="dist">District</label>
                              <input type="text" class="form-control" id="dis" name="dis" value="Kamrup" required>
                            </div>
                              
                            <div class="form-group col-md-4">
                              <label for="state">State</label>
                              <input type="text" class="form-control" id="st" name="st" value="Assam" required>
                            </div>
                            </div>
                              
                            <div class="form-group col-md-4">
                              <label for="pin">Pin Number</label>
                              <input type="text" class="form-control" id="pin" name="pin" required>
                            </div>

                            <div class="form-group col-md-4">
                              <label for="image">Profile Photo</label>
                              <input type="file" class="form-control" id="image" name="image" required>
                            </div>

                        </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit">
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                    <button type="button" class="btn btn-info" onclick="gohome()">Go Back</button>
                                </div>
                            </div>
                            
                        </form>                       
                </fieldset>
            </div>                  
        </div>
    </div>
    <div class="footer">

    </div>
    

    
    
    <script>
    $(document).ready(function() {
        var today = new Date().toDateString();
        $('.today').html(today);
    })
    </script>

    
    <script>
            function gohome()
            {
                window.location.href="dashboard.php"
            }
        </script>
        
    
    
    
    
</body>
</html>