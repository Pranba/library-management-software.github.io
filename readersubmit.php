    <?php
    session_start();
    include 'connect.php';
    // // define variables and set to empty values
    // $nameErr = "";
    // $name = "";

    // if($_SERVER["REQUEST_METHOD"]=="POST")
    // {
    //     if(empty($_POST["name"]))
    //     {
    //         $nameErr= "Please Enter the Name";
    //     }
    //     else
    //     {
    //         $rname=$_POST['name'];

    //     }
    // }
    if (isset($_POST['submit'])) {

    $cardno=$_POST['cardno'];
    $rname = $_POST['name'];
    $fname=$_POST['fname'];
    $mble=$_POST['mobilen'];
    $mail=$_POST['mail'];
    $add1=$_POST['ad1'];
    $add2=$_POST['ad2'];
    $dist=$_POST['dis'];
    $state=$_POST['st'];
    $pin=$_POST['pin'];
    $image = $_FILES['image']['name']; 
    $image_tmp = $_FILES['image']['tmp_name'];


    move_uploaded_file($image_tmp,"images/$image");


    $stmt= $con->prepare("INSERT INTO reader (card_no, rname, fname, mobile, email, add1, add2, dist, state, pin, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssssis", $cardno, $rname, $fname, $mble, $mail, $add1, $add2, $dist, $state, $pin, $image);

    if($stmt){

        echo '
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script>
            $( document ).ready(function() {
                swal.fire({
                      title: "Good job!",
                      text: "Registration Successfull",
                      icon: "success",
                      
                    });
            });
            </script>';
     

    }
    else
    {
        echo "<script type='text/javascript'>alert('failed!')</script>";
    }
    }       


    $stmt->execute();
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
        <div class="container">
            <div class="loginbox" style="top: 60px" >
                <div class="col-md-12 col-centered" style="bottom: 60px;">
                    <h3>LIBRARY CARD</h3>
                    <table class='table table-bordered text-left'>
                        <tr>
                            <td>Card No. </td>
                            <td><?php echo $cardno; ?></td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td><?php echo $rname; ?></td>
                        </tr>
                        <tr>
                            <td>Father's Name</td>
                            <td><?php echo $fname; ?></td>
                        </tr>
                        <tr>
                            <td>Mobile No</td>
                            <td><?php echo $mble; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $mail; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo "$add1, $add2 <br> $dist, $state <br> $pin"; ?></td>
                        </tr>
                    </table>
                    <div style="clear:both">
                        <p style="folat: left">Signature of Card Holder</p>
                        <p style="folat: right">Signature of Librarian</p>
                    </div>
                </div>
                <button type="button" class="btn btn-warning" onclick="gohome()">Go Home</button>
                <button type="button" class="btn btn-info" onclick="window.print();">Print Card</button>
            </div>
        </div>

       
        <script>
            function gohome()
            {
                window.location.href="dashboard.php"
            }
        </script>
        
    

    </body>
    </html>