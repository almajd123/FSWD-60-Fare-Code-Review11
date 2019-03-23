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

   $id = $_POST['id'];

   echo $sql = "UPDATE events SET  eventname ='$eventname', eventDate = $eventdate,eventTime =$eventTime,price ='$price',location ='$eventlocation',resweb ='$rweb', resimg = '$rimg' WHERE eventID = {$id}";
   if($conn->query($sql) === TRUE) {
       echo "<p>Successfully Updated</p>";
       echo "<a href='../eventupdate.php?id=".$id."'><button type='button'>Back</button></a>";
       echo "<a href='../controlpanel.php'><button type='button'>Home</button></a>";
   } else {
       echo "Error while updating record : ". $conn ->error;
   }

   $conn->close();

}

?>