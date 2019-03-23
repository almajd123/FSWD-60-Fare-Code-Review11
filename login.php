<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';
$error = false;
$nameError="";
$emailError="";
$passError="";
$name="";
$email="";
if( isset($_SESSION['user']) ) {
 header("Location: user.php");
 
 exit;
}
if( isset($_SESSION['admin']) ) {
 header("Location: index.php");
 
 exit;
}
$error = false;
if( isset($_POST['btn-login']) ) {
 // prevent sql injections/ clear user invalid inputs
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);
 $pass = trim($_POST['pass']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);
 // prevent sql injections / clear user invalid inputs
 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }
 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }
 // if there's no error, continue to login
 if (!$error) {
  
  $password = hash('sha256', $pass); // password hashing
  $res=mysqli_query($connect, "SELECT userID, username, password, rule FROM users WHERE email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);// $res->fetch_all(MYSQLI_ASSOC)
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row 
  //mysqli_num_rows() it will give you how many row you have in your result 
  
  if( $count == 1 && $row['userPass']==$password ) {
    //$_SESSION['user'] = $row['userId'];
    
    if ($row["rule"] == "admin") {
      $_SESSION['admin']=$row['userID'];
      header("Location: index.php");
    }else{
      $_SESSION['user']=$row['userID'];
      header("Location: user.php");
    }
  } else {
   $errMSG = "Incorrect Credentials, Try again...";
  }
  
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login & Registration System</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
  <div id="navBar">
            <nav class="navbar navbar-expand-md navbar-dark bg-danger">
                <div class="container">
                    
                
                <a class="navbar-brand text-white" href="#">CodeReview 11</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                    <!-- <li class="nav-item active">
                                  <a class="nav-link btn btn-outline-danger" href="#" data-toggle="modal" data-target="#exampleModalCenter4"> Add New Book <span class="sr-only">(current)</span></a>
                                  
                </li>
                 -->
                 <!-- <a href="create.php">
                    <button type="button" class="btn btn-outline-danger">
                        Add New Book
                    </button>
                                 </a> -->
                </ul>
                <div class="my-2 my-md-0">
                
                <a href="register.php">
                    <button type="button" class="btn btn-outline-danger">
                        register
                    </button>
                </a>
                </div>
            </div>
            </div>
            </nav>
            </div>
  <div class="container my-4">
   <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
  
    
            <h2 class="text-danger">Sign In.</h2>
            <hr />
            
           <?php
          if ( isset($errMSG) ) {
            echo $errMSG; ?>
                      
                       <?php
          }
          ?>
           
          
            
            <input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
          
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
            <button type="submit" name="btn-login" class="btn btn-danger">Sign In</button>
          
          
            <hr />
  
            <a href="signup.php">Sign Up Here...</a>
      
          
   </form>
 </div>
   </div>
</div>
</body>
</html>
<?php ob_end_flush(); ?>