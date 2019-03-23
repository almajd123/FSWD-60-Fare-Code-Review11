
<?php
session_start();
if (!isset($_SESSION['users'])) {
 header("Location: indexuser.php");
} else if(isset($_SESSION['users'])!="") {
 header("Location: signin.php");
}
if (!isset($_SESSION['admin'])) {
 header("Location: signin.php");
} else if(isset($_SESSION['admin'])!="") {
 header("Location: index.php");
}
if (isset($_GET['logout'])) {
 unset($_SESSION['users']);
  unset($_SESSION['admin']);
 session_unset();
 session_destroy();
 header("Location: signin.php");
 exit;
}
?>