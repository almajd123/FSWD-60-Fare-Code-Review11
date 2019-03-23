<?php 

require_once 'db_connect.php';

if($_POST){
   $id = $_POST['id'];

   $sql = "DELETE FROM events WHERE eventID = {$id}";
   if($conn->query($sql) === TRUE) {
       echo "<p>Successfully deleted!!</p>";
       echo "<a href='../controlpanel.php'><button type='button'>Back</button></a>";
   } else {
       echo "Error updating record : " . $conn->error;
   }

   $conn->close();
}

?>