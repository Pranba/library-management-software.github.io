<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    
</head>
<body id="main">
    <div class="container">
        <div class="loginbox">
                <h4>Login</h4>
            <form autocomplete="off" class="col-md-12 text" action="loginAction.php" method="POST">
            <div class="form-group input-group col-mb-5">
                <div class="input-group-prepend">
                    <span class="input-group-text">User ID</span>
                </div>
                    <input type="text" name=user class="form-control">
                </div>

            <div class="form-group input-group col-mb-5">
                <div class="input-group-prepend">
                      <span class="input-group-text">Password</span>
                </div>
                    <input type="password" name=pass class="form-control">
                </div>
                <div class="form-group col-md-12 text-center">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-angle-double-right"></i> Login
                    </button>
    
                    <button type="reset" class="btn btn-warning">
                        <i class="fas fa-times"></i> Reset
                    </button>
                    
                    </div>
            </form>
            <p>User ID: Pranba<p>
            <p>Pass: pran123<p>
        </div>
        
    </div>

    
        <!--
        <div id="form_div">
            <h2 class="col-md-6 offset-md-3">Login Form</h2>
            <form autocomplete="off" class="loginbox" action="loginAction.php" method="POST">
                    <div class="input-group col-mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">User ID</span>
                        </div>
                        <input type="text" name=user class="form-control">
                      </div>
                      <div class="input-group col-mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Password</span>
                        </div>
                        <input type="text" name=user class="form-control">
                      </div>

                    
                

            </form>
        </div>
        -->
    </div>
    
    </body>


</html>