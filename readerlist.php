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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
    integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
    integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
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
        <div class="col-md-12 card" style="margin-top:30px; margin-bottom: 30px;">
        
    <h3 class="text-center">LIST OF BOOKS</h3>
            <hr>
            <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-3 float-left add-new-button">
            <a href="AddReader.php" class="btn btn-primary btn-block">
              <i class="fas fa-plus"></i> Add New Record
            </a>
          </div>
          <div class="col-md-3 float-left add-new-button">
            <button onclick="window.print()" class="btn btn-success btn-block"><i class="fas fa-print"></i> Print</button>
              
            </a>
          </div>
        </div>  
                <?php
                    include 'connect.php';
                        $useri=$_SESSION['id'];
                        $sl=0;
                            $select="SELECT * FROM reader";
                            $result=$con->query($select);
                        if($result)
                    {
                ?>

                <table class='table table-striped table-bordered text-left'>
                    <thead class="bg-secondary text-white">
                    <tr>
                        <th scope=col>Sl. No</th>
                        <th scope=col>Card No</th>
                        <th scope=col>Name</th>
                        <th scope=col>Mobile No</th>
                        <th scope=col>Email</th>
                        <th scope=col>View</th>
                        <th scope=col>Update</th>
                        <th scope=col>Delete</th>
                    </tr>
                    </thead>
                    <?php
                    while($row=$result->fetch_assoc())
                        {
                    ?>
                    <tr>
                        <td> <?php echo $row['rID'] ?></th>
                        <td> <?php echo $row['card_no'] ?> </td>
                        <td> <?php echo $row['rname'] ?></td>
                        <td> <?php echo $row['mobile'] ?></td>
                        <td> <?php echo $row['email']?></td>
                        <td>
                            <button type="button" class="btn btn-info viewBtn"> <i class="fas fa-eye"></i> View </button>
                        </td>

                        <td>
                            <button type="button" class="btn btn-warning updateBtn"> <i class="fas fa-edit"></i> Update </button>
                        </td>

                        <td>
                              <button type="button" class="btn btn-danger deleteBtn"> <i class="fas fa-trash-alt"></i> Delete </button>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                    </table>
                    <?php
                    }
                    else
                    {
                        echo "No records found";
                    }
                    $con->close();
                    ?>
            </div>
        </div>

<!---------------- Delete Modal------------>
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="deletereader.php" method="POST">

          <div class="modal-body">

            <input type="hidden" name="deleteId" id="deleteId">

            <h4>Are you sure want to delete?</h4>

          </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary" name="deleteData">Yes</button>
        </div>

        </form>
      </div>
    </div>
  </div>

  <!------------------------End Delete Modal---------------->



    
<div class="footer">
        
</div>
<!-###############################################JS CODE ########################->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
    integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>


<!-----------------Delete JS--------------->
<script>
    $(document).ready(function () {
      $('.deleteBtn').on('click', function(){

        $('#deleteModal').modal('show');
        
        // Get the table row data.
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);

        $('#deleteId').val(data[0]);

        });
    
    });
  </script>

<!-------------- Delete End------------>

</body>
</html>