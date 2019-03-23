<?php require_once 'actions/db_connect.php';
ob_start();
session_start();
// if session is not set this will redirect to login page
if( isset($_SESSION['user']) ) {
 header("Location: user.php");
 
 exit;
}
if( isset($_SESSION['admin']) ) {
 header("Location: signin.php");
 
 exit;
}
 ?>

 

<!DOCTYPE html>

<html>

<head>

    <title>PHP CRUD</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>



<body>
    <div id="navBar">
            <nav class="navbar navbar-expand-md navbar-dark bg-danger">
                <div class="container">
                    
                
                <a class="navbar-brand text-white" href="index.php">CodeReview 11</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                                  <a class="nav-link btn btn-outline-danger" href="#" data-toggle="modal" data-target="#exampleModalCenter4"> Add New Book <span class="sr-only">(current)</span></a>
                                  
                </li>
                 -->
                
                </ul>
                <div class="my-2 my-md-0">
                
                </div>
            </div>
            </div>
            </nav>
            </div>
            </div>
            <div id="hero" class="container">
                <div class="row mb-2">
                </div>
            </div>
    <div class="container my-4">
        <div class="jumbotron">
        <div class="container">
          <h1 class="display-3 text-center text-danger">Hello there</h1>
          <p class="text-center">please register or sign in to use our website</p>
          <p class="text-center"><a href="log_in.php" style="text-decoration:none">
            <button type="button" class="btn btn-outline-danger">
                log in
            </button>
        </a>
        <a href="signin.php">
            <button type="button" class="btn btn-outline-danger">
                register
            </button>
        </a></p>
        </div>
      </div>
        
        </div>
            



 

</body>

</html>

<?php ob_end_flush();  ?>