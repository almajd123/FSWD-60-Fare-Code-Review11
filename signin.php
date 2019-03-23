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
 header("Location: indexuser.php");
 
 exit;
}
if( isset($_SESSION['admin']) ) {
 header("Location: controlpanel.php");
 
 exit;
}
$error = false;
if( isset($_POST['btn-signin']) ) {
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
  $res=mysqli_query($conn, "SELECT userID, username, password, rules FROM users WHERE email='$email'");
  $row=mysqli_fetch_array($res, MYSQLI_ASSOC);// $res->fetch_all(MYSQLI_ASSOC)
  $count = mysqli_num_rows($res); // if uname/pass is correct it returns must be 1 row 
  //mysqli_num_rows() it will give you how many row you have in your result 
  
  if( $count == 1 && $row['password']==$password ) {
    //$_SESSION['user'] = $row['userId'];
    
    if ($row["rules"] == "admin") {
      $_SESSION['admin']=$row['userID'];
      header("Location: controlpanel.php");
    }else{
      $_SESSION['user']=$row['userID'];
      header("Location: indexuser.php");
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
		<title>Login</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<div class="container-fluid">
			<header class="header" class="">
				<h1>Login</h1>
				<style>
					h1{ text-align: center;
						font-size:45px;
						font-weight:all;
						color:#ccc;

					background: black;
					height: 75px;
					margin: 20px auto;
					width: 330px;
				}
				</style>
	
			</header><!-- /header -->



			<?php
			if ( isset($errMSG) ) {
				echo $errMSG; ?>

				<?php
			}
			?>

            
           
			 <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
			<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        
            <span class="text-danger"><?php echo $emailError; ?></span>
  
          
            <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
        
           <span class="text-danger"><?php echo $passError; ?></span>
            <hr />
				<button type="submit" class="btn btn-block btn-primary" name="btn-signin">Sign In</button>
				<a href="signup.php">Sign Up Here...</a>
			</form>
			<footer class="footer">

			</footer>

		</div>
	</body>
	</html>
	<?php ob_end_flush(); ?>