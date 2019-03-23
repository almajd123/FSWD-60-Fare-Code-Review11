<?php 

require_once 'db_connect.php';

if($_POST) {
   $eventname = $_POST['eventname'];
   $eventdate = $_POST['eventDate'];
   $eventtime = $_POST['eventTime'];
    $price = $_POST['price'];
     $eventlocation = $_POST['location'];
   $eventimg = $_POST['eventimg'];
   $eventweb = $_POST['eventweb'];
         


   $sql = "INSERT INTO events (eventname,EventDate,EventTime,price,loction,eventweb,eventimg) VALUES ('$eventname','$eventdate','$eventtime','$price','$loction','$eventweb','$eventimg')";
   if($conn->query($sql) === TRUE) {
       echo "<p>New Record Successfully Created</p>";
       echo "<a href='../event_create.php'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error " . $sql . ' ' . $conn->conn_error;
   }

   $conn->close();
}

?>