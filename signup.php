<?php
ob_start();
session_start(); // start a new session or continues the previous
function sanitize($a){
    $b = trim($a);
    $b = strip_tags($b);
    $b = htmlspecialchars($b);
    return $b;
}
if( isset($_SESSION['user'])!="" ){
 header("Location: index.php"); // redirects to home.php
}
include_once 'actions/db_connect.php';
if ( isset($_POST['btn-signup']) ) {
 $error = false;

 // sanitize user input to prevent sql injection

   // htmlspecialchars converts special characters to HTML entities
 $username = trim($_POST['username']);
 $username = strip_tags($username);
 $username = htmlspecialchars($username);

 // htmlspecialchars converts special characters to HTML entities
 $email = trim($_POST['email']);
 $email = strip_tags($email);
 $email = htmlspecialchars($email);

 $pass = trim($_POST['password']);
 $pass = strip_tags($pass);
 $pass = htmlspecialchars($pass);



 // basic name validations
if (empty($username)) {
  $error = true;
  $usernameError = "Please enter your name.";
} else if (strlen($username) < 3) {
  $error = true;
  $usernameError = "Name must have at least 3 characters.";
} else if (!preg_match("/^[a-zA-Z ]+$/",$username)) {
  $error = true;
  $usernameError = "Name must contain alphabets and space.";
}

 //basic email validation
if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
} else {
  // checks whether the email exists or not
  $query = "SELECT email FROM users WHERE email ='$email'";
  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($count!=0){
   $error = true;
   $emailError = "Provided Email is already in use.";
 }
}
//password validation
if (empty($pass)){
  $error = true;
  $passError = "Please enter password.";
} else if(strlen($pass) < 6) {
  $error = true;
  $passError = "Password must have atleast 6 characters.";
}
 // password hashing for security
$password = hash('sha256', $pass);

 // if there's no error, continue to signup
if( !$error ) {

  $query = "INSERT INTO users(username, email, password) VALUES ('$username','$email','$password')";
  $result = mysqli_query($conn, $query);
  
  if ($result) {
   $errTyp = "success";
   $errMSG = "Successfully registered, you may login now";
   unset($username);
   unset($email);
   unset($pass);
   unset($phone);
 } else {
   $errTyp = "danger";
   $errMSG = "Something went wrong, try again later...";
 }

}


}
?>
<!DOCTYPE html>
<html>
<head>
  <title>SignUp</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
  
  #form {
    flex-direction: column;
    width: 20%;
    margin: 10%;
    position: absolute;

  }

  h1 {
    text-align: center;
    font-size:45px;
    font-weight:all;
    color:#ccc;
    background: black;
    height: 76px;
    margin: 30px auto;
    width: 270px;
  }
}

</style>
</head>
<body>
  <div class="container-fluid">
    <script type="text/javascript">

    $(document).ready(function(){
        $("#checkemail").keyup(email_check);
    });
    function email_check() {
        var email = $("#checkemail").val();

        if(email == '' || email.length < 3 ){
            $('#checkemail').css('border', '6px #CCC solid');

        }else{
            jQuery.ajax({
                type:"POST",
                url:"check.php",
                data:"email=" + email,
                cache: false,
                success:function(response){
                    if(response == 0){
                        $('#checkemail').css('border', '6px  #090 solid');

                    }else{
                        $('#checkemail').css('border', '6px #C33 solid');

                    }
                }
            });

        }
    }

    $(document).ready(function(){
        $("#passw").keyup(password_match);
    });
    function password_match() {
        var pass1 = $("#passw").val();
        var pass2 = $("#passw2").val();

        if (passw == '' || passw2 == '') {
            $('#passw').css('border', '6px #CCC solid');
            $('#passw2').css('border', '6px #CCC solid');}

        else
            if (pass1 != pass2) {
                $('#passw').css('border', '63 #C33 solid');
                $('#passw2').css('border', '6px  #C33 solid');
            } else {
                $('#passw').css('border', '6px #090 solid');
                $('#passw2').css('border', '6px #090 solid');
            }
        }





</script>
    <header class="header" class="">
      <h1>Register</h1>
    </header><!-- /header -->

    <?php
    if ( isset($errMSG) ) {

     ?>
     <div class="alert alert-<?php echo $errTyp ?>">
      <?php echo $errMSG; ?>
    </div>

    <?php
  }
  ?>
  <form class="form" method="POST" accept-charset="utf-8" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="text" id="username" name="username" placeholder="Insert username" value=""><br>
    <span class="text-danger"><?php echo $usernameError; ?></span>
    <input type="email" id="email" name="email" placeholder="Insert E-Mail"><br>
    <span class="text-danger"><?php echo $emailError; ?></span>
    <input type="password" id="password" name="password" placeholder="Insert Password"><br>
    <span class="text-danger"><?php echo $passwordError; ?></span>
    <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
    <a href="signin.php">Sign In Here...</a>
  </div>
</form>
</body>
</html>


<?php ob_end_flush(); ?>