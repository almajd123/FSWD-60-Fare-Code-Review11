<?php require_once 'actions/db_connect.php'; ?>

 <?php
ob_start();
session_start();
if( !isset($_SESSION['user']) ) {
 header("Location: signin.php");
 
 exit;
}
$res=mysqli_query($conn, "SELECT * FROM users WHERE userID=".$_SESSION['user']);
$userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>

<html>

<head>

    <title>home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <!-- make the navbar -->
    <div id="navBar">
<nav class="navbar navbar-dark bg-dark">
                <div class="container">
                    
                
                <a class="navbar-brand text-white" href="index.php"><h1>Travel Matic</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarsExample04">
                <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                <a class="nav-link" href="restaurant.php">restaurants <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="events.php">events <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                <a class="nav-link" href="famousplace.php">Famous Place <span class="sr-only"></span></a>
                </li>
                </ul>

                <a href="logout.php?logout">Sign Out</a></h5>
                <div class="row mb-2">
                </form>
            </div>
            </div>
            </nav>
            </div>
            </div>
            <!--_________________________________________________________________________________________________-->
              
              <tbody>
                <?php
                // read the data from events table 
                    $sql = "
              SELECT * from location
              RIGHT JOIN `events` ON  location.fk_events = events.eventID ";

                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                
                    echo "<tr>
                     <td><img src='".$row["eventimg"]."' style=width:550px;height:xpx;/> </td>
                    <br><td>".$row["eventname"]."</td>
                    <td>".$row["EventDate"]."</td>
                    <td>".$row["EventTime"]."</td>
                    <td>".$row["price"]."</td>
                    <td>".$row["location"]."</td>
                    <td>".$row["eventweb"]."</td></br>
                   
         </tr>";
       }}
        ?>
  </tbody>
</body>
</html>
<?php ob_end_flush(); ?>
           