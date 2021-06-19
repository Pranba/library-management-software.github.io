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
    <title>AddBooks</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
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
    <div class="col"></div>
        
    <div class="container">
        <div class="panel panel-default" style="width:70%; margin-top: 30px;" >               
            <div class="panel-heading">
                <span class="text-primary">Book Entry Form</span>
                <span class="text-muted pull-right today" title="today"></span> </div>
                <div class="panel-body sty">
                <fieldset class="col-md-12">    	
                   <!-- <legend>Book Details</legend>  -->
                        <form id="integerForm" action="booksubmit.php" method="POST">
                            <div class="form-group row">
                                <label for="bname" class="col-md-2 col-form-lebel">Book's Name</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="bname" placeholder="Book Name" required>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <label for="author" class="col-md-2 col-form-lebel">Writer</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="author" placeholder="Writer Name" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                    <label for="isbn" class="col-md-2 col-form-lebel">ISBN</label>
                                        <div class="col-md-10">
                                        <input type="text" class="form-control" name="isbn" placeholder="ISBN" required>
                                    </div>
                            </div>

                            <div class="form-group row">
                                    <label for="edtn" class="col-md-2 col-form-lebel" required>Edition:</label>
                                        <div class="col-md-10">   
                                                <select class="form-control" name="edtn" required>
                                                  <option></option>
                                                  <option>First</option>
                                                  <option>Second</option>
                                                  <option>Third</option>
                                                </select>
                                    </div>
                                </div>
                                
                            <div class="form-group row">
                                <label for="price" class="col-md-2 col-form-lebel">Price</label>
                                    <div class="col-md-10">
                                    <input type="text" class="form-control" name="price" placeholder="Price of Book" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="qnty" class="col-md-2 col-form-lebel">Nos. of Books</label>
                                    <div class="col-md-4">
                                    <input type="text" class="form-control" name="qnty" placeholder="Nos. of Book purchased" required>
                                </div>

                                <label for="publisher" class="col-md-2 col-form-lebel">Publisher</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="publisher" placeholder="Publisher" required>
                                </div>

                            </div>
                            
                            <div class="form-group row">
                                <label for="pyar" class="col-md-2 col-form-lebel">Published Year</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="pyar" placeholder="Publishimg Year" required>
                                </div>


                            </div>
                            <div class="form-group row">
                                    <label for="cate" class="col-md-2 col-form-lebel">Category:</label>
                                    <div class="col-md-8">   
                                            <select class="form-control" name="cate" required>
                                                  <option></option>
                                                  <?php
                                              include 'connect.php';
                                              $sql = "SELECT * FROM tblcategory";
                                              $result = $con->query($sql);
                                              if ($result->num_rows > 0) { 
                                                  // output data of each row
                                                  while($row = $result->fetch_assoc()) {
                                                    echo "<option value='" . $row['CategoryName'] . "'>" . $row['CategoryName'] . "</option>";
                                                  }
                                              } 
                                              $con->close();
                                            ?>
                                                </select>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#btn-modal">
  Add Category
</button>
                                    </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" id="btnSubmit" class="btn btn-success" value="Submit">
                                    <input type="reset" class="btn btn-warning" value="Reset">
                                    <button type="button" class="btn btn-info" onclick="gohome()">Go Back</button>
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
            <form action="addCategory.php" method="POST">
                <div class="form-group">
                <lebel for="category" class="col-form-lebel">Category Name</lebel>
                <input type="text" class="form-control" name="catname" required="">
            </div>
            <div class="form-group text-right">
                <input type="submit" class="btn btn-success float-end" name="submit" value="Create Category">

                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <div class="footer">
        <p>Designed and Developed by : Prankrishna Das</p>
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

<script type="text/javascript">
    $(function () {
        $("#btnSubmit").click(function () {
            var category = $("#category");
            if (category.val() == "") {
                //If the "Please Select" option is selected display error.
                alert("Please select an option!");
                return false;
            }
            return true;
        });
    });
</script>
    
</body>
</html>