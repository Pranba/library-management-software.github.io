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
    $query = "SELECT `sID`, `rName`, `bName`, `issue_date` FROM `issue` WHERE `sID` = $id LIMIT 1";
    
    $result = mysqli_query($con, $query);
    
    // if id exist 
    // show data in inputs
    if(mysqli_num_rows($result) > 0)
    {
      while ($row = mysqli_fetch_array($result))
      {
        $issueid = $row['sID'];
        $rname = $row['rName'];
        $bname = $row['bName'];
        $issuedate = $row['issue_date'];
      } 
        
    }
    
    // if the id not exist
    // show a message and clear inputs
    else {
        echo "<script type='text/javascript'>alert('Please check the issue number')</script>";
            $issueid = "";
            $rname = "";
            $bname = "";
            $issuedate = "";
    }
    
    
    mysqli_free_result($result);
    mysqli_close($con);
    
}

// in the first time inputs are empty
else{
    $issueid = "";
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
                    <span class="text-primary">Book Return Form</span>
                    <span class="text-muted pull-right today" title="today"></span> 
                </div>
                    <div class="panel-body sty">

                        <fieldset class="col-md-12">    	
                           <!-- <legend>Book Details</legend>  -->
                                <form action="returnbooks.php" method="POST">

                                    <div class="form row">
                                        <label for="rname" class="col-md-2 col-form-lebel"></label>
                                        <div class="col-md-6">   
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="id" placeholder="Please Enter issue Number">
                                                <span class="input-group-btn">
                                                    <input class="btn btn-default" type="submit" name="search" value="Search">
                                                </span>
                                                </div>
                                        </div>

                                        <div class="col-md-2 form-group">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-modal">Search Issue ID</button>
                                        </div>

                                    </div>  
                                    </form>


                                    <form action="returnAction.php" method="POST">

                                    <div class="form-group row">
                                        <label for="id" class="col-md-2 col-form-lebel">Issue ID</label>
                                            <div class="col-md-10">
                                            <input type="text" class="form-control" name="id" value="<?php echo $issueid;?>" readonly >
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label for="rName" class="col-md-2 col-form-lebel">Reader Name</label>
                                            <div class="col-md-10">
                                            <input type="text" class="form-control" name="rName" value="<?php echo $rname;?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="bName" class="col-md-2 col-form-lebel">Book Name</label>
                                            <div class="col-md-10">
                                            <input type="text" class="form-control" name="bName" value="<?php echo $bname;?>" readonly>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="date" class="col-md-2 col-form-lebel">Issue Date</label>
                                            <div class="col-md-10">
                                            <input type="text" class="form-control" name="date" value="<?php echo $issuedate;?>" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date" class="col-md-2 col-form-lebel">Return Date</label>
                                            <div class="col-md-10">
                                            <input type="text" class="form-control" name="rdate" id="datepicker" placeholder="Return Date">
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
                                            <input type="hidden" class="form-control" name="returnbook" value="YES" readonly>
                                    </div>
                            

                                    <div class="form-group row">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-success" value="Submit">
                                            <input type="reset" class="btn btn-warning" value="Reset">
                                            <button type="button" class="btn btn-primary" onclick="gohome()">Go Back</button>
                                        </div>
                                    </div>

                                </form>
                            
                            </fieldset>
                        </div>
            
                </div>
        </div>


        <div class="modal fade" id="btn-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Create Category</h4>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
          </div>
          <div class="modal-body">
            <form action="" method="POST">
                
            <div class="form-group text-right">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
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
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
</html>