<?php

include 'connect.php';
session_start(); //starts all the sessions 
if($_SESSION["logged_in"] == NULL) {
   header('Location: unath.html'); //take user to the login page if there's no information stored in session variable
}
if(isset($_POST['search']))
{
    // id to search
    $id = $_POST['id'];
    
    // connect to mysql
    
    
    // mysql search query
    $query = "SELECT 'card_no', `rname` FROM `reader` WHERE `card_no` = $id LIMIT 1";
    
    $result = mysqli_query($con, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $rname = $row['rname'];
        $card=$row['card_no'];
        
      }  
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo '<script type="text/javascript">alert("Please Enter Your Correct Card Number")</script>';
        $rname = "";
            
    }
    
    
    mysqli_free_result($result);
    mysqli_close($con);
    
}

// in the first time inputs are empty
else{
    $rname = "";
    $bname = "";
    $issuedate = "";
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Issue Returns</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

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
                <span class="text-primary">Book Issue Form</span>
                <span class="text-muted pull-right today" title="today"></span> </div>
                <div class="panel-body sty">
                            
                <fieldset class="col-md-12">    	
                   <!-- <legend>Book Details</legend>  -->
                        <form id="integerForm" action="issue.php" method="POST">
                            <div class="form-group row">
                                <label for="rname" class="col-md-2 col-form-lebel"></label>
                                    <div class="col-md-10">   
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="id" placeholder="Please Enter Crad Number" required>
                                        <span class="input-group-btn">
                                            <input class="btn btn-default" type="submit" name="search" value="Search">
                                        </span>
                                        </div>
                                </div>
                            </div>
                            </form>
                            
                            <form name="myForm" action="issuesubmit.php" onsubmit="return validateForm" method="POST">
                            <div class="form-group row">
                                <input type="hidden" class="form-control" name="card" value="<?php echo $id;?>" readonly required>

                                <label for="rName" class="col-md-2 col-form-lebel">Reader Name</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="rName" value="<?php echo $rname;?>" readonly required>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="bname" class="col-md-2 col-form-lebel">Book's Name:</label>
                                        <div class="col-md-10">   
                                                <select class="form-control" name="bname" required>
                                                  <option></option>
                                                  <?php
                                              include 'connect.php';
                                              $sql = "SELECT * FROM books";
                                              $result = $con->query($sql);
                                              if ($result->num_rows > 0) { 
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['bname'] . "'>" . $row['bname'] . "</option>";
                                                  }
                                              } 
                                              $con->close();
                                            ?>
                                                </select>
                                    </div>
                                </div>
                            <!---
                            <div class="form-group row">
                                <label for="bid" class="col-md-2 col-form-lebel">Book ID</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="bid" placeholder="Password">
                                </div>
                            </div>
                            --->
                            <div class="form-group row">
                                <label for="date" class="col-md-2 col-form-lebel">Issue Date</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="date" id="datepicker" placeholder="Issue Date" required>
                                    <script>
                                        $(function() {
                                        $( "#datepicker" ).datepicker({
                                        dateFormat : 'yy-mm-dd',
                                        changeMonth : true,
                                        changeYear : true,
                                        yearRange: '-1y:c+nn',
                                        maxDate: '0d'
                                       
                                            });
                                        });
   
                                    </script>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" class="btn btn-success" value="Submit">
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

    <script>
    $(document).ready(function() {
        $('#integerForm').bootstrapValidator();
    });
    </script>

    <script>
    function validateForm() {
      var x = document.forms["myForm"]["rName"].value;
      if (x == "") {
        alert("Name must be filled out");
        return false;
      }
    }
    </script>


        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script type="text/javascript" src="vali.js"></script>
</body>
</html>